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
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class AuthController extends Controller
{
    private $kodeverifikasi;

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
    public function cekLoginAdmin(Request $request) // cek login untuk semua user, tadinya maunya admin doang
    {   
        $input = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]); 

        $email = $request->email;

        if (Auth::attempt($input)) {

            $user = User::where('id', auth()->user()->id)->first(); // get User sesuai auth

            Auth::logout();

            $kodeverifikasi = random_int(100000, 999999);  // kode verifikasi
    
            $dataEmail = [
                'subjek' => '[E-SPP SMK REKAYASA] - Verifikasi Masuk',
                'kodeverifikasi' => $kodeverifikasi,
                'name' => $user->name,
            ];
    
            $dataSms = [
                'pesan' => 'Hai, ' . $user->name . '! ' . $kodeverifikasi . ' adalah kode verifikasi Anda pada Aplikasi E-SPP SMK REKAYASA. Jangan beritahu kepada siapapun!'
            ];

            // $user->notify(new LoginVerificationNotification($dataSms));
            // Mail::to('elfanhari88@gmail.com')->send(new LoginVerification($dataEmail));  // kirim password ke email elfan
            // Mail::to($email)->send(new LoginVerification($dataEmail));  // kirim password ke email user tersebut

            return redirect('/verifikasiemail')->with([
                'kodeverifikasi' => $kodeverifikasi,
                'user_id'        => $user->id,
                'kadaluarsa'    => time() + 60,
            ]);
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

        $id = session('user_id');
        $user_id = session()->flash('user_id', $id);
        $user_id = session()->get('user_id');

        $time = session('kadaluarsa');
        $kadaluarsa = session()->flash('kadaluarsa', $time);
        $kadaluarsa = session()->get('kadaluarsa');


        $user = User::where('id', $user_id)->first();

        if (session()->has('info')){
            $kodeverifikasi = session('info');
        }

        if (session()->has('user_id')){
            $user_id = session('user_id');
        }

        if (session('user_id') == null){
            return redirect('/login');
        }

        return view('pages.auth.login.verifikasi', [
            'email' => $user->email,
            'kodeverifikasi' => $kodeverifikasi,
            'user_id' => $user_id,
            'kadaluarsa' => $kadaluarsa
        ]);

    }

    // KONFIRMASI VERIFIKASI EMAIL
    public function storeVerifikasiEmail(Request $request)
    {   

        
        $kodeverifikasi = $request->kodeverifikasi;
        $user_id = $request->user_id;
        $kadaluarsa = intval($request->kadaluarsa);

        if (time() < $kadaluarsa){
            
            if ($request->inputverifikasi == $kodeverifikasi) {
                Auth::loginUsingId($user_id);
                
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
    
            } else {
                return back()->with([
                    'kodeverifikasi' => $kodeverifikasi,
                    'user_id' => $user_id,
                    'inputverifikasi' => 'Kode verifikasi yang anda masukkan tidak sesuai!',
                    'kadaluarsa' => $kadaluarsa,
                ]);
            }

        } else {
            return redirect('/login')->with('info', 'Kode verifikasi anda sudah kadaluarsa!');
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