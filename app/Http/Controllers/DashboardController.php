<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use App\Models\Notifikasi;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        return view('pages.admin.dashboard.index', [
            'prodi'      => Kompetensikeahlian::all(),
            'kelas'      => Kelas::all(),
            'siswa'      => User::with('user')->where('level', 'siswa'),
            'spp'        => Spp::all(),
            'petugas'    => User::where('level', 'petugas')->get(),
            'admin'      => User::where('level', 'admin')->get(),
            'pembayaran' => Pembayaran::all(),
            'notifikasiPetugas' => Notifikasi::where('penerima_id', null)->get(),
        ]);
    }
}
