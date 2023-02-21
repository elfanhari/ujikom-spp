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
            'identifier' => 'i' . Str::random(9),
            'pengirim_id' => Auth::user()->id,
            'penerima_id' => $request->penerima_id,
            'pesan' => $request->pesan,
            'tipe' => $request->tipe,
            'dibaca' => false,
        ];

        Notifikasi::create($notifikasi);
        return back()->withInfo('Notifikasi berhasil dikirim!');
    }

    public function show(Notifikasi $notifikasi)
    {
        return view('pages.admin.notifikasi.show', [
            'notifikasi' => $notifikasi
        ]);
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, Notifikasi $notifikasi)
    {
        $notifikasi->update($request->all());
        return redirect(route('notifikasi.show', $notifikasi));
    }


    public function telahDibaca(Request $request, Notifikasi $notifikasi)
    {
        if ($request->untuk == 'satu') {
            $notifikasi->update($request->all());
            return redirect(route('notifikasi.index'));
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
            return redirect(route('notifikasi.index'));
        }

        if ($request->untuk == 'semua') {
            Notifikasi::where('penerima_id', null)->delete();
            return back();
        }
    }
}
