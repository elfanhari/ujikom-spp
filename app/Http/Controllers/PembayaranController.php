<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembayaranRequest;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Controllers;
use Illuminate\Support\Facades\Redis;

class PembayaranController extends Controller
{  
    public function index()
    {
        $vw_bayar = DB::table('vw_pembayaran');
        
        return view('pages.admin.datapembayaran.index', [
            'pembayaran' => Pembayaran::with(['userPetugas', 'userSiswa'])->paginate('10'),
            // 'pembayaran' => $vw_bayar->get()
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
            'kelas' => Kelas::all()
        ]);
    }
    
    public function store(PembayaranRequest $request)
    {   
        Pembayaran::create($request->all());
        return redirect(route('pembayaran.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    
    public function show(Pembayaran $pembayaran)
    {
        return view('pages.admin.datapembayaran.show', [
            'pembayaran' => $pembayaran->load('userSiswa')
        ]);
    }

    
    public function edit(Pembayaran $pembayaran)
    {
        if (auth()->user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }

        return view('pages.admin.datapembayaran.edit', [
            'pembayaran' => $pembayaran,
            'siswa' => User::whereLevel('siswa')->get(),
        ]);
    }

    
    public function update(PembayaranRequest $request, Pembayaran $pembayaran)
    {
        Pembayaran::find($pembayaran->id)->update($request->all());
        return redirect(route('pembayaran.index'))->with('info', 'Data berhasil diubah!');
        // return route('index');
    }

    
    public function destroy(Pembayaran $pembayaran)
    {
        Pembayaran::find($pembayaran->id)->delete();
        return redirect(route('pembayaran.index'))->with('info', 'Data berhasil dihapus!');
    }
}
