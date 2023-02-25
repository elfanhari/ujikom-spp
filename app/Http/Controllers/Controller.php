<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public $gateAdmin;

    public function gateAdmin() // Pembatasan Akses Selain Admin
    {
        if (Auth::user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }
    }

}
