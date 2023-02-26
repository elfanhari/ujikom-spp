<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        return view('pages.admin.history.index', [
            'my' => Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->where('petugas_id', auth()->user()->id)->latest()->get(),
            'all' => Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->latest()->get(),
            'mandiri' => Pembayaran::with(['userSiswa', 'userPetugas', 'bulanbayar'])->where('jenistransaksi', 'mandiri')->latest()->get()
        ]);
    }
    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    
    public function show(Pembayaran $pembayaran)
    {
        //
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
