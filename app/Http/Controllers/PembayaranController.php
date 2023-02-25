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
use App\Models\Buktipembayaran;
use App\Models\Bulanbayar;
use App\Models\Notifikasi;
use App\Models\Userphoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PembayaranController extends Controller
{  
    public function index()
    {
        return view('pages.admin.datapembayaran.index', [
            'pembayaran' => Pembayaran::with(['userPetugas', 'userSiswa', 'bulanbayar'])->latest()->get(),
        ]);
    }

    
    public function create(Request $request)
    {   
        $siswa = User::where('kelas_id', $request->kelas_id);
        $siswaCek = User::where('id', $request->siswa_id);
        return view('pages.admin.entripembayaran.create', [
            'kelas' => Kelas::all(),
            'siswa' => $siswa->get(),
            'siswaCek' => $siswaCek->get(),
            'spp' => Spp::all(),
            'bulanbayar' => Bulanbayar::all(),
            'kelas' => Kelas::all(),
            'userphoto' => Userphoto::where('user_id', $request->siswa_id)->get(),
            'historysiswa' => Pembayaran::where('siswa_id', $request->siswa_id)->where('status', 'sukses')->latest()->get(),
         ]);
    }
    
    
    public function store(PembayaranRequest $request)
    {   
        $request['identifier'] = 'i' . Str::random(9);
        Pembayaran::create($request->all());

        $pembayaranTerakhir = Pembayaran::latest()->first();
        $kodeTransaksi = Str::upper($pembayaranTerakhir->identifier);
        $notifikasiSukses = [
            'identifier' => 'i' . Str::random(9),
            'pengirim_id' => Auth::id(),
            'penerima_id' => $pembayaranTerakhir->siswa_id,
            'pesan' => 'Transaksi anda dengan kode transaksi ' . $kodeTransaksi . ' telah berhasil! ' . ' Terimakasih telah melakukan pembayaran untuk ' . $pembayaranTerakhir->bulanbayar->name . ' ' . $pembayaranTerakhir->tahunbayar . '.',
            'tipe' => 'sukses',
            'dibaca' => false 
        ];
        Notifikasi::create($notifikasiSukses);
        return redirect(route('pembayaran.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    
    public function show(Pembayaran $pembayaran)
    {
        return view('pages.admin.datapembayaran.show', [
            'pembayaran' => $pembayaran,
            'historysiswa' => Pembayaran::where('siswa_id', $pembayaran->siswa_id)->latest()->get(),
            'userphoto' => Userphoto::where('user_id', $pembayaran->siswa_id)->get(),
            'buktipembayaran' => Buktipembayaran::where('pembayaran_id', $pembayaran->id)->get(),
        ]);
    }

    
    public function edit(Pembayaran $pembayaran)
    {
        return view('pages.admin.datapembayaran.edit', [
            'pembayaran' => $pembayaran,
            'siswa' => User::whereLevel('siswa')->get(),
            'bulanbayar' => Bulanbayar::all(),
        ]);

    }

    
    public function update(PembayaranRequest $request, Pembayaran $pembayaran)
    {   
        $pembayaran->update($request->all());
        return redirect(route('pembayaran.index'))->withInfo('Data berhasil diubah!');
    }

    
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect(route('pembayaran.index'))->withInfo('Data berhasil dihapus!');
    }

    public function updateStatus(Request $request,Pembayaran $pembayaran) // Update Status Pembayaran
    {
        $pembayaran->update($request->all());

        $kodeTransaksi = Str::upper($pembayaran->identifier);
        
        $notifikasiSukses = [
            'identifier' => 'i' . Str::random(9),
            'pengirim_id' => Auth::id(),
            'penerima_id' => $pembayaran->siswa_id,
            'pesan' => 'Transaksi anda dengan kode ' . $kodeTransaksi . ' telah berhasil diproses! ' . ' Terimakasih telah melakukan pembayaran untuk ' . $pembayaran->bulanbayar->name . ' ' . $pembayaran->tahunbayar . '.',
            'tipe' => 'sukses',
            'dibaca' => false 
        ];

        $notifikasiInfo = [
            'identifier' => 'i' . Str::random(9),
            'pengirim_id' => Auth::id(),
            'penerima_id' => $pembayaran->siswa_id,
            'pesan' => 'Transaksi anda dengan kode ' . $kodeTransaksi . ' sedang diproses!' . ' Tunggu konfirmasi selanjutnya dari petugas!',
            'tipe' => 'info',
            'dibaca' => false 
        ];

        $notifikasiPeringatan = [
            'identifier' => 'i' . Str::random(9),
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
}
