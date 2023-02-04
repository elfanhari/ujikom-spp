<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\PetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function updateProfile(PetugasRequest $request)
    {
        dd($request->all());
    }

}
