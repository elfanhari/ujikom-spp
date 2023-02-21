<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public $gateAdmin;

    // public function gateAdmin($gateAdmin) // Pembatasan Akses Selain Admin
    // {
    //     $this->$gateAdmin = $gateAdmin;
    // }

}
