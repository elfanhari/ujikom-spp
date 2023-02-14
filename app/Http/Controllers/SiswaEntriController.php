<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaEntripembayaranRequest;
use App\Models\Buktipembayaran;
use App\Models\Bulanbayar;
use App\Models\Metodepembayaran;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SiswaEntriController extends Controller
{
    
    public function index()
    {
        return view('pages.siswa.entri.index', [
            'siswa' => Auth::user(),
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
            'identifier' => 'i' . Str::random(9),
            'siswa_id' => $request->siswa_id,
            'bulanbayar_id' => $request->bulanbayar_id,
            'metodepembayaran_id' => $request->metodepembayaran_id,
            'tahunbayar' => $request->tahunbayar,
            'tanggalbayar' => $request->tanggalbayar,
            'jumlahbayar' => $request->jumlahbayar,
            'jenistransaksi' => 'mandiri',
            'status' => 'diproses',
        ];

        Pembayaran::create($pembayaran);

        $getIdPembayaranTerakhir = Pembayaran::latest()->first();
        
        $files = $request->file('files');
        if ($request->hasFile('files')) {
            $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
            $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension                  = $files->getClientOriginalExtension();
            $filenamesimpan             = 'buktipembayaran' . time() . '.' . $extension;
            $files->move('buktipembayaran', $filenamesimpan);

            Buktipembayaran::create([
                'identifier'    => 'i' . Str::random(9),
                'pembayaran_id' => $getIdPembayaranTerakhir->id,
                'url'           => $filenamesimpan,
                'is_featured'   => 0
            ]);
        } 

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
