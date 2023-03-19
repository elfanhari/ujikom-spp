<?php

namespace App\Http\Controllers;

use App\Models\Bulanbayar;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // LAPORAN - siswa yang belum bayar
    public function index(Request $request)
    {   
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        $pembayaran = Pembayaran::whereRaw("CONCAT(bulanbayar_id, tahunbayar) = :merge", 
                      ['merge' => $request->bulanbayar_id . $request->tahunbayar])
                      ->pluck('siswa_id');

        $siswa = User::where('kelas_id', $request->kelas_id)
                       ->where('aktif', true)
                       ->whereNotIn('id', $pembayaran)
                       ->orderBy('name', 'ASC')
                       ->get();

        return view('pages.admin.tagihan.index', [
            'kelas' => Kelas::all(),
            'bulan' => Bulanbayar::all(),
            'tahun' => [2020, 2021, 2022, 2023, 2024, 2025, 2026],
            'siswa' => $siswa,
        ]);
    }

    // PRINT - Laporan Tagihan
    public function create(Request $request)
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        $pembayaran = Pembayaran::whereRaw("CONCAT(bulanbayar_id, tahunbayar) = :merge", 
                      ['merge' => $request->bulanbayar_id . $request->tahunbayar])
                      ->pluck('siswa_id');

        $siswa = User::where('kelas_id', $request->kelas_id)
                       ->whereNotIn('id', $pembayaran)
                       ->orderBy('name', 'ASC')
                       ->get();

        return view('pages.admin.tagihan.printtagihan', [
            'kelas' => Kelas::where('id', $request->kelas_id)->get(),
            'bulan' => Bulanbayar::where('id', $request->bulanbayar_id)->get(),
            'tahun' => $request->tahunbayar,
            'siswa' => $siswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
