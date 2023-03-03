<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaEntripembayaranRequest;
use App\Models\Buktipembayaran;
use App\Models\Bulanbayar;
use App\Models\Metodepembayaran;
use App\Models\Notifikasi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SiswaEntriController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->level !== 'siswa') {return view('denied');} // Pembatasan Akses Selain Siswa
        
        return view('pages.siswa.entri.index', [
            'siswa' => Auth::user(),
            'historysiswa' => Pembayaran::with('userSiswa')->where('siswa_id', auth()->user()->id)->latest()->get(),
            'bulanbayar' => Bulanbayar::get(),
            'metodepembayaran' => Metodepembayaran::get(),
        ]);   
    }

    public function create()
    {
        //
    }

    
    public function store(SiswaEntripembayaranRequest $request)
    {
        $pembayaran = [
            'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            'siswa_id' => $request->siswa_id,
            'bulanbayar_id' => Str::before($request->pembayaranuntuk, '-'),
            'metodepembayaran_id' => $request->metodepembayaran_id,
            'tahunbayar' => Str::after($request->pembayaranuntuk, '-'),
            'tanggalbayar' => $request->tanggalbayar,
            'jumlahbayar' => $request->jumlahbayar,
            'jenistransaksi' => 'mandiri',
            'status' => 'diproses',
        ];

        Pembayaran::create($pembayaran);

        $pembayaranTerakhir = Pembayaran::latest()->first();
        
        $files = $request->file('files');
        if ($request->hasFile('files')) {
            $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
            $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension                  = $files->getClientOriginalExtension();
            $filenamesimpan             = 'buktipembayaran' . time() . '.' . $extension;
            $files->move('buktipembayaran', $filenamesimpan);

            Buktipembayaran::create([
                'identifier'    => 'i' . Str::random(4) . time(). Str::random(5),
                'pembayaran_id' => $pembayaranTerakhir->id,
                'url'           => $filenamesimpan,
                'is_featured'   => 0
            ]);
        } 

        $kodeTransaksi = Str::upper($pembayaranTerakhir->identifier);

        $notifikasiForSiswa = [
            'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            'pengirim_id' => '1',
            'penerima_id' => $pembayaranTerakhir->userSiswa->id,
            'pesan' => 'Transaksi anda dengan kode ' . $kodeTransaksi . ' sedang diproses!' . ' Tunggu konfirmasi selanjutnya dari petugas!',
            'tipe' => 'info',
            'dibaca' => false 
        ];

        $notifikasiForPetugas = [
            'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            'pengirim_id' => $pembayaranTerakhir->userSiswa->id,
            'penerima_id' => null,
            'pesan' => $pembayaranTerakhir->userSiswa->name . ' - ' . $pembayaranTerakhir->userSiswa->kelas->name . ' melakukan pembayaran mandiri untuk ' . $pembayaranTerakhir->bulanbayar->name . ' ' .$pembayaranTerakhir->tahunbayar . ' dengan kode transaksi ' . $kodeTransaksi . ' pada tanggal ' .  Str::before(date('d-m-Y', strtotime($pembayaranTerakhir->created_at)), ' ') . ' pukul ' . Str::after($pembayaranTerakhir->created_at, ' ') . ' WIB.',
            'tipe' => 'info',
            'dibaca' => false 
        ];

        Notifikasi::create($notifikasiForSiswa);
        Notifikasi::create($notifikasiForPetugas);

        return redirect(route('riwayat.index'))->withInfo('Transaksi anda sedang diproses! silahkan tunggu konfirmasi dari petugas.');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
