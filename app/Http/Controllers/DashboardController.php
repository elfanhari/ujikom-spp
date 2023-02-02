<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('pages.admin.dashboard.index', [
            'prodi'      => Kompetensikeahlian::all(),
            'kelas'      => Kelas::all(),
            'siswa'      => User::where('level', 'siswa'),
            'spp'        => Spp::all(),
            'petugas'    => User::where('level', 'petugas')->get(),
            'admin'      => User::where('level', 'admin')->get(),
            'pembayaran' => Pembayaran::all(),
        ]);
    }
}
