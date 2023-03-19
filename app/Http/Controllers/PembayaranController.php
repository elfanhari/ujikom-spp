<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Controllers;
use App\Jobs\KirimStrukJob;
use App\Jobs\LoginVerificationJob;
use App\Mail\StrukPembayaran;
use App\Models\Buktipembayaran;
use App\Models\Bulanbayar;
use App\Models\Notifikasi;
use App\Models\Userphoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class PembayaranController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        $with = ['userPetugas', 'userSiswa', 'bulanbayar'];
        return view('pages.admin.datapembayaran.index', [
            'semua' => Pembayaran::withOnly($with)->latest()->get(),
            'sukses' => Pembayaran::withOnly($with)->where('status', 'sukses')->latest()->get(),
            'diproses' => Pembayaran::withOnly($with)->where('status', 'diproses')->latest()->get(),
            'gagal' => Pembayaran::withOnly($with)->where('status', 'gagal')->latest()->get(),
        ]);
    }


    public function create(Request $request)
    {
        
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        $siswa = User::with('kelas')->where('kelas_id', $request->kelas_id);
        $siswaCek = User::with('kelas', 'spp', 'notifikasiPenerima')->where('id', $request->siswa_id);
        $bulanbayar = Bulanbayar::get();
        return view(
            'pages.admin.entripembayaran.create',
            [
                'kelas' => Kelas::all(),
                'siswa' => $siswa->orderBy('name', 'asc')->get(),
                'siswaCek' => $siswaCek->get(),
                'spp' => Spp::all(),
                'kelas' => Kelas::orderBy('name', 'asc')->get(),
                'userphoto' => Userphoto::where('user_id', $request->siswa_id)->get(),
                'historysiswa' => Pembayaran::where('siswa_id', $request->siswa_id)->where('status', 'sukses')->latest()->get(),
            ]
        );
    }


    public function store(PembayaranRequest $request)
    {

        // PERCOBAAN

        $jumlahBulanDibayar = count($request->pembayaranuntuk);
        if ($jumlahBulanDibayar > 1) {
        for ($i = $jumlahBulanDibayar - 1; $i >= 0; $i--) {
                $bulanbayar = Str::before($request->pembayaranuntuk[$i], '-');
                $tahunbayar = Str::after($request->pembayaranuntuk[$i], '-');

                $request['bulanbayar_id'] = $bulanbayar;
                $request['tahunbayar'] = $tahunbayar;
                $request['identifier'] = 'i' . Str::random(4) . time() . Str::random(5);
                Pembayaran::create($request->all());
            }
            return redirect()->route('pembayaran.index')->with('info', 'Pembayaran sukses!');
        } else {

            $bulanbayar = Str::before($request->pembayaranuntuk[0], '-');
            $tahunbayar = Str::after($request->pembayaranuntuk[0], '-');

            $request['bulanbayar_id'] = $bulanbayar;
            $request['tahunbayar'] = $tahunbayar;
            $request['identifier'] = 'i' . Str::random(4) . time() . Str::random(5);
            Pembayaran::create($request->all());

            $pembayaranTerakhir = Pembayaran::latest()->first();
            $kodeTransaksi = Str::upper($pembayaranTerakhir->identifier);
            $notifikasiSukses = [
                'identifier' => 'i' . Str::random(4) . time() . Str::random(5),
                'pengirim_id' => Auth::id(),
                'penerima_id' => $pembayaranTerakhir->siswa_id,
                'pesan' => 'Transaksi anda dengan kode transaksi ' . $kodeTransaksi . ' telah berhasil! ' . ' Terimakasih telah melakukan pembayaran untuk ' . $pembayaranTerakhir->bulanbayar->name . ' ' . $pembayaranTerakhir->tahunbayar . '.',
                'tipe' => 'sukses',
                'dibaca' => false
            ];
            Notifikasi::create($notifikasiSukses);
            return redirect(route('pembayaran.show', $pembayaranTerakhir->identifier))->with('info', 'Pembayaran berhasil dibuat!');
        }
    }


    public function show(Pembayaran $pembayaran)
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }
        return view('pages.admin.datapembayaran.show', [
            'pembayaran' => $pembayaran,
            'historysiswa' => Pembayaran::where('siswa_id', $pembayaran->siswa_id)->latest()->get(),
            'userphoto' => Userphoto::where('user_id', $pembayaran->siswa_id)->get(),
            'buktipembayaran' => Buktipembayaran::where('pembayaran_id', $pembayaran->id)->get(),

        ]);
    }


    public function edit(Pembayaran $pembayaran)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datapembayaran.edit', [
            'pembayaran' => $pembayaran,
            'siswa' => User::whereLevel('siswa')->get(),
            'bulanbayar' => Bulanbayar::all(),
        ]);
    }


    public function update(PembayaranRequest $request, Pembayaran $pembayaran)
    {
        $request->validate(['tahunbayar' => ['required', 'digits:4']]);
        $pembayaran->update($request->all());
        return redirect(route('pembayaran.show', $pembayaran->identifier))->withInfo('Data berhasil diubah!');
    }


    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect(route('pembayaran.index'))->withInfo('Data berhasil dihapus!');
    }

    public function updateStatus(Request $request, Pembayaran $pembayaran) // Update Status Pembayaran
    {
        $pembayaran->update($request->all());

        $kodeTransaksi = Str::upper($pembayaran->identifier);

        $notifikasiSukses = [
            'identifier' => 'i' . Str::random(4) . time() . Str::random(5),
            'pengirim_id' => Auth::id(),
            'penerima_id' => $pembayaran->siswa_id,
            'pesan' => 'Transaksi anda dengan kode ' . $kodeTransaksi . ' telah berhasil diproses! ' . ' Terimakasih telah melakukan pembayaran untuk ' . $pembayaran->bulanbayar->name . ' ' . $pembayaran->tahunbayar . '.',
            'tipe' => 'sukses',
            'dibaca' => false
        ];

        $notifikasiInfo = [
            'identifier' => 'i' . Str::random(4) . time() . Str::random(5),
            'pengirim_id' => Auth::id(),
            'penerima_id' => $pembayaran->siswa_id,
            'pesan' => 'Transaksi anda dengan kode ' . $kodeTransaksi . ' sedang diproses!' . ' Tunggu konfirmasi selanjutnya dari petugas!',
            'tipe' => 'info',
            'dibaca' => false
        ];

        $notifikasiPeringatan = [
            'identifier' => 'i' . Str::random(4) . time() . Str::random(5),
            'pengirim_id' => Auth::id(),
            'penerima_id' => $pembayaran->siswa_id,
            'pesan' => 'Transaksi anda dengan kode ' . $kodeTransaksi . ' gagal diproses!' . ' Silahkan lakukan pembayaran ulang dengan melampirkan bukti transfer yang valid atau melakukan pembayaran melalui petugas di Ruang Tata Usaha. Terima kasih',
            'tipe' => 'peringatan',
            'dibaca' => false
        ];

        if ($pembayaran->status == 'sukses') {
            Notifikasi::create($notifikasiSukses);
        }
        if ($pembayaran->status == 'diproses') {
            Notifikasi::create($notifikasiInfo);
        }
        if ($pembayaran->status == 'gagal') {
            Notifikasi::create($notifikasiPeringatan);
        }

        return back()->withInfo('Status pembayaran berhasil diubah!');
    }

    public function printStruk(Pembayaran $pembayaran)
    {
        return view('pages.admin.datapembayaran.printstruk', compact('pembayaran'));
    }

    public function kirimStruk(Pembayaran $pembayaran)
    {
        $emailSiswa = $pembayaran->userSiswa->email;

        $dataEmail = [
            'subjek' => '[E-SPP SMK REKAYASA] - Rincian Pembayaran',
            'kode' => strtoupper($pembayaran->identifier),
            'waktu' => Str::before(date('d-m-Y', strtotime($pembayaran->created_at)), ' ') . ' | ' . Str::after($pembayaran->created_at, ' '),
            'siswa' => $pembayaran->userSiswa->name,
            'kelas' => $pembayaran->userSiswa->kelas->name,
            'pembayaranuntuk' => $pembayaran->bulanbayar->name . ' - ' . $pembayaran->tahunbayar,
            'jumlahbayar' => 'Rp' . number_format($pembayaran->jumlahbayar, 0, '.', '.'),
            'jenistransaksi' => strtoupper($pembayaran->jenistransaksi),
            'metodepembayaran' => strtoupper($pembayaran->metodepembayaran->payment),
            'petugas' => $pembayaran->userPetugas->name,
            'status' => strtoupper($pembayaran->status),
        ];

        Mail::to($emailSiswa)->send(new StrukPembayaran($dataEmail));  // kirim password ke email user tersebut
        // Mail::to('elfanhari88@gmail.com')->send(new StrukPembayaran($dataEmail));  // kirim password ke email elfan

        return back()->with('info', 'Rincian pembayaran telah dikirim ke email ' . $emailSiswa . '.');
    }
}
