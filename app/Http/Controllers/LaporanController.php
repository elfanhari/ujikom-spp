<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $daritanggal = $request->daritanggal;
        $sampaitanggal = $request->sampaitanggal;
        $petugas_id = $request->petugas_id;

        $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->latest();

        if(request('petugas_id')){
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->where('petugas_id', $petugas_id)->latest();
        }
        
        if(request('daritanggal')){
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->whereBetween('tanggalbayar', [$daritanggal, $sampaitanggal])->where('petugas_id', $petugas_id)->latest();
        }

        return view('pages.admin.laporan.index', [
            'pembayaran' => $pembayaran->get(),
            'petugas' => User::where('level', 'petugas')->orWhere('level', 'admin')->get(),
        ]);
        
    }

   
    public function create(Request $request)
    {
        $daritanggal = $request->daritanggal;
        $sampaitanggal = $request->sampaitanggal;
        $petugas_id = $request->petugas_id;

        $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->latest();

        if(request('petugas_id')){
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->where('petugas_id', $petugas_id)->latest();
        }

        if(request('daritanggal')){
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->whereBetween('tanggalbayar', [$daritanggal, $sampaitanggal])->where('petugas_id', $petugas_id)->latest();
        }
        
        return view('pages.admin.laporan.printlaporan', [
            'pembayaran' => $pembayaran->get(),
            'petugas_id' => $petugas_id,
            'daritanggal' => $daritanggal,
            'sampaitanggal' => $sampaitanggal,
            'petugas' => User::where('level', 'petugas')->orWhere('level', 'admin')->get(),
        ]);   
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show(Request $request)
    {
        
    }


    public function edit(Pembayaran $pembayaran)
    {
        //
    }

   
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
