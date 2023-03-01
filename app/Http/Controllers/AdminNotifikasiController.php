<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifikasiRequest;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminNotifikasiController extends Controller
{
   
    public function index()
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        return view('pages.admin.notifikasi.index', [
            'notifikasi' => Notifikasi::where('penerima_id', null)->latest()->get(),
            'siswa' => User::where('level', 'siswa')->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(NotifikasiRequest $request)
    {
        $notifikasi = [
            'identifier' => 'i' . Str::random(4) . time(). Str::random(5),
            'pengirim_id' => Auth::user()->id,
            'penerima_id' => $request->penerima_id,
            'pesan' => $request->pesan,
            'tipe' => $request->tipe,
            'dibaca' => false,
        ];

        Notifikasi::create($notifikasi);
        return back()->withInfo('Notifikasi berhasil dikirim!');
    }

    public function show(Notifikasi $notifikasis)
    {
        
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        return view('pages.admin.notifikasi.show', [
            'notifikasi' => $notifikasis
        ]);
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, Notifikasi $notifikasi)
    {
        $notifikasi->update($request->all());
        return redirect(route('admin.notifikasi.show', $notifikasi));
    }


    public function telahDibaca(Request $request, Notifikasi $notifikasi)
    {
        if ($request->untuk == 'satu') {
            $notifikasi->update($request->all());
            return redirect(route('admin.notifikasi.index'));
        }

        if ($request->untuk == 'semua') {
            Notifikasi::where('penerima_id', null)->update([
                'dibaca' => true
            ]);
            return back();
        }
    }


    public function destroy(Request $request, Notifikasi $notifikasi)
    {
        if ($request->untuk == 'satu') {
            $notifikasi->delete();
            return redirect(route('admin.notifikasi.index'));
        }

        if ($request->untuk == 'semua') {
            Notifikasi::where('penerima_id', null)->delete();
            return back();
        }
    }
}
