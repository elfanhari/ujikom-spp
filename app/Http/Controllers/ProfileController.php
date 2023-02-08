<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\PetugasRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.profile.index', [
            'user' => auth()->user(),
            'userphoto' => Userphoto::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->all());
        return redirect(route('profile.index'))->with('info', 'Data berhasil diubah!');
    }

    public function editPassword()
    {
        return view('pages.admin.profile.editpassword');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        if(Hash::check($request->password_sebelumnya, auth()->user()->password)) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect()->route('profile.index')->with('info', 'Password anda berhasil diperbarui!');
        }
    }

}
