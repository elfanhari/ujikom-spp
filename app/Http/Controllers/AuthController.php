<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function pageLoginAdmin()
    {
        
        return view('pages.auth.login.index');
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

    public function pageLupaPassword()
    {
        return view('pages.auth.lupapassword.index');
    }

    public function storeLupaPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $user = User::where('email', $request->email)->get(); // get User sesuai email yang di input
     
        if ($user->count()>0) {

            $passwordBaru = 'p' . Str::random(9);  // password baru untuk user
        
            $user[0]->update(['password' => $passwordBaru]);  // reset password

            $dataEmail = [
                'subjek' => 'E-SPP SMK REKAYASA - Lupa Password',
                'passwordbaru' => $passwordBaru,
                'name' => $user[0]->name,
            ];

            Mail::to($request->email)->send(new SendEmail($dataEmail));  // kirim password ke email user tersebut

            return view('pages.auth.lupapassword.success', [
                'email' => $request->email
            ]);  

        } else {

            throw ValidationException::withMessages([
                'email' => 'Email tidak ada! Silakan masukkan email yang sesuai.',
            ]);
            
        }
    }
    public function logout() {
        Auth::logout();
        return redirect(route('home'));
    }

}