<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    
    public function index()
    {
        return view('pages.admin.history.index', [
            'my' => Pembayaran::with(['userSiswa', 'userPetugas'])->where('petugas_id', auth()->user()->id)->get(),
            'all' => Pembayaran::with(['userSiswa', 'userPetugas'])->get()
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
