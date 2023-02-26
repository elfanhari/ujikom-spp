<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function gateAdmin() // Pembatasan Akses Selain Admin
    {
         if (auth()->user()->level !== 'admin') { 
            return view('denied');
        }
    }
    
    public function gateAdminDanPetugas() // Pembatasan Akses Selain Admin dan Petugas
    {
         if (auth()->user()->level !== 'admin' || auth()->user()->level !== 'petugas') {
            return view('denied');
        }
    }

    public function gateSiswa() // Pembatasan Akses Selain Admin
    {
         if (auth()->user()->level !== 'siswa') {
            return view('denied');
        }
    }

}
