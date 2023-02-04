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

class PembayaranController extends Controller
{
    
    public function index()
    {
        $vw_bayar = DB::table('vw_pembayaran');
        
        return view('pages.admin.datapembayaran.index', [
            'pembayaran' => Pembayaran::with(['userSiswa', 'userPetugas'])->latest()->get(),
            // 'pembayaran' => $vw_bayar->get()
        ]);
    }

    
    public function create()
    {
        return view('pages.admin.entripembayaran.create', [
            'siswa' => User::with(['kelas'])->whereLevel('siswa')->get(),
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
