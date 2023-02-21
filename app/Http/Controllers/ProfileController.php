<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{

    public function index()
    {
        return view('pages.admin.profile.index', [
            'user' => auth()->user(),
            'redirect' => '/admin/profile',
            'userphoto' => Userphoto::where('user_id', auth()->user()->id)->get(),
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
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => $request->password]);
            return redirect()->route('siswaprofile.index')->with('info', 'Password anda berhasil diperbarui!');
        }

        // Jika password sebelumnya salah, berikan pesan validasi
        throw ValidationException::withMessages([
            'current_password' => 'Password anda sebelumnya tidak sesuai',
        ]);
    }

}
