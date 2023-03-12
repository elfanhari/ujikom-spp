<?php

namespace App\Http\Controllers;

use App\Jobs\ForgotPasswordJob;
use App\Jobs\LoginVerificationJob;
use App\Mail\LoginVerification;
use App\Mail\SendEmail;
use App\Models\User;
use App\Notifications\ForgotPasswordNotification;
use App\Notifications\LoginVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Notifications\WelcomeSmsNotification;

class AuthController extends Controller
{
    // HALAMAN LOGIN
    public function pageLoginAdmin()
    {   
        return view('pages.auth.login.index');
    }   


    // LOGIN TANPA VERIFIKASI
    // public function cekLoginAdmin(Request $request)
    // {
    //     $input = $request->validate([
    //         'username' => ['required'],
    //         'password' => ['required'],
    //     ]); 

    //     if (Auth::attempt($input)) {
    //         $level = auth()->user()->level;
            
    //         if ($level == 'admin') {
    //             return redirect('/admin')->withInfo('Admin');
    //         }
    //         elseif ($level == 'petugas') {
    //             return redirect('/admin')->withInfo('Petugas');
    //         } 
    //         elseif ($level == 'siswa') {
    //             return redirect('/siswa/beranda')->withInfo('Siswa');
    //         } 
    //         else {
    //             Auth::logout(); //Hapus Session
    //             return back()->with('info', 'Email atau password salah!');
    //         }
    //     }
    // }
    

    // LOGIN DENGAN VERIFIKASI GMAIL
    public function cekLoginAdmin(Request $request)
    {   
        $input = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]); 

        $email = $request->email;

        if (Auth::attempt($input)) {

            $user = User::where('id', auth()->user()->id)->first(); // get User sesuai auth
            $kodeverifikasi = random_int(100000, 999999);  // kode verifikasi
    
            $dataEmail = [
                'subjek' => '[E-SPP SMK REKAYASA] - Verifikasi Masuk',
                'kodeverifikasi' => $kodeverifikasi,
                'name' => $user->name,
            ];
    
            $dataSms = [
                'pesan' => 'Hai, ' . $user->name . '! ' . $kodeverifikasi . ' adalah kode verifikasi Anda pada Aplikasi E-SPP SMK REKAYASA. Jangan beritahu kepada siapapun!'
            ];

            $user->notify(new LoginVerificationNotification($dataSms));
            // Mail::to('elfanhari88@gmail.com')->send(new LoginVerification($dataEmail));  // kirim password ke email elfan
            Mail::to($email)->send(new LoginVerification($dataEmail));  // kirim password ke email user tersebut

            return redirect('/verifikasiemail')->with('kodeverifikasi', $kodeverifikasi);
        }
            
        else {
            return back()->with('info', 'Email atau password salah!');
        }
    }

    // HALAMAN KODE VERIFIKASI EMAIL
    public function pageVerifikasiEmail()
    {
        $kode = session('kodeverifikasi');
        $kodeverifikasi = session()->flash('kodeverifikasi', $kode);
        $kodeverifikasi = session()->get('kodeverifikasi');
        $kodeverifikasi = $kodeverifikasi;

        if (session()->has('info')){
            $kodeverifikasi = session('info');
        }

        return view('pages.auth.login.verifikasi', [
            'email' => auth()->user()->email,
            'kodeverifikasi' => $kodeverifikasi,
        ]);

    }

    // KONFIRMASI VERIFIKASI EMAIL
    public function storeVerifikasiEmail(Request $request)
    {   
        $kodeverifikasi = $request->kodeverifikasi;
        
        if ($request->inputverifikasi == $kodeverifikasi) {
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
                return redirect('/login')->with('info', 'Email atau password salah!');
            }

        } else {
            return back()->with('kodeverifikasi', $kodeverifikasi);
            throw ValidationException::withMessages([
                'inputverifikasi' => 'Kode verifikasi yang anda masukkan tidak sesuai!',
            ]);

        }
    }


    // HALAMAN LUPA PASSWORD
    public function pageLupaPassword()
    {
        return view('pages.auth.lupapassword.index');
    }


    // STORE EMAIL LUPA PASSWORD
    public function storeLupaPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->get(); // get User sesuai email yang di input
     
        if ($user->count() > 0) {
            $passwordBaru = 'p' . Str::random(9);  // password baru untuk [0]
            $user[0]->update(['password' => $passwordBaru]);  // reset password

            $dataEmail = [
                'subjek' => '[E-SPP SMK REKAYASA] - Lupa Password',
                'passwordbaru' => $passwordBaru,
                'name' => $user[0]->name,
            ];

            $dataSms = [
                'pesan' => 'Hai, ' . $user[0]->name . '! ' . $passwordBaru . ' adalah password baru Anda pada Aplikasi E-SPP SMK REKAYASA. Jangan beritahu kepada siapapun!'
            ];

            $user[0]->notify(new ForgotPasswordNotification($dataSms)); // kirim sms ke nomor user tersebut
            // Mail::to('elfanhari88@gmail.com')->send(new SendEmail($dataEmail));  // kirim password ke email elfan
            Mail::to($user[0]->email)->send(new SendEmail($dataEmail));  // kirim password ke email user tersebut

            return view('pages.auth.lupapassword.success', [
                'email' => $request->email
            ]);  

        } else {
            throw ValidationException::withMessages([
                'email' => 'Email tidak ada! Silakan masukkan email yang sesuai.',
            ]); 
        }
    }
    
    // LOGOUT
    public function logout() {
        Auth::logout();
        return redirect(route('home'));
    }

}