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
use App\Models\Bulanbayar;
use Illuminate\Support\Facades\Redis;

class PembayaranController extends Controller
{  
    public function index()
    {
        return view('pages.admin.datapembayaran.index', [
            'pembayaran' => Pembayaran::with(['userPetugas', 'userSiswa'])->latest()->paginate('10'),
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
            'kelas' => Kelas::all()
        ]);
    }
    
    
    public function store(PembayaranRequest $request)
    {   
        $request['identifier'] = 'i' . Str::random(9);
        Pembayaran::create($request->all());
        return redirect(route('pembayaran.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    
    public function show(Pembayaran $pembayaran)
    {
        return view('pages.admin.datapembayaran.show', compact('pembayaran'));
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
        $pembayaran->update($request->all());
        return redirect(route('pembayaran.index'))->withInfo('Data berhasil diubah!');
    }

    
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect(route('pembayaran.index'))->withInfo('Data berhasil dihapus!');
    }
}
