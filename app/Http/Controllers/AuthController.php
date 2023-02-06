<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function pageLoginAdmin()
    {
        return view('pages.auth.admin.login');
    }   

    public function cekLoginAdmin(Request $request)
    {
        $input = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]); 

        if (Auth::attempt($input)) {
            $level = auth()->user()->level;

            if ($level == 'admin') {
                return redirect('/admin')->withInfo('Admin');
            }
            elseif ($level == 'petugas') {
                return redirect('/admin')->withInfo('Petugas');
            } 
            elseif ($level == 'siswa') {
                return redirect('/siswa/beranda')->withInfo('Siswa');
            } 
            else {
                Auth::logout(); //Hapus Session
                return back()->with('info', 'Email atau password salah!');
            }
        }

        else {
            return back()->with('info', 'Email atau password salah!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(route('home'));
    }

}
