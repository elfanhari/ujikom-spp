<?php

namespace App\Http\Controllers;

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

        $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->latest();

        if(request('petugas_id')){
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->where('petugas_id', $petugas_id)->latest();
        }

        if(request('daritanggal')){
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->whereBetween('tanggalbayar', [$daritanggal, $sampaitanggal])->where('petugas_id', $petugas_id)->latest();
        }

        return view('pages.admin.laporan.index', [
            'pembayaran' => $pembayaran->paginate(10),
            'petugas' => User::where('level', 'petugas')->orWhere('level', 'admin')->get(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $daritanggal = $request->daritanggal;
        $sampaitanggal = $request->sampaitanggal;
        $pick = Pembayaran::whereBetween('tanggalbayar', [$daritanggal, $sampaitanggal])->get();
        dd($pick->count());
        return route('laporan.show', [
            'pick' => $pick
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
