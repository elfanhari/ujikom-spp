<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class MainSiswaController extends Controller
{
    public function siswaMain()
    {
        return view('master.siswa.main', [
            'notifikasi' => Notifikasi::where('penerima_id', auth()->user()->id)->latest()->get(),
            'notifikasidibaca' => Notifikasi::where('penerima_id', auth()->user()->id)->orWhere('dibaca', true)->latest()->get(),
            'notifikasibelumdibaca' => Notifikasi::where('penerima_id', auth()->user()->id)->orWhere('dibaca', false)->latest()->get()
        ]);
    }
}
