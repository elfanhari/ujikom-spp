<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetugasController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datapetugas.index', [
            'petuga' => User::where('level', 'petugas')->latest()->get(),
            'pembayaran' => Pembayaran::all()
        ]);
    }


    public function create()
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datapetugas.create');
    }


    public function store(PetugasRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(4) . time(). Str::random(5);
        User::create($request->all());
        return redirect(route('petugas.index'))->with('info', 'Data berhasil ditambahkan!');
    }


    public function show(User $petuga)
    {   
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datapetugas.show',[
            'petuga' => $petuga,
            'userphoto' => Userphoto::where('user_id', $petuga->id)->get(),
            'redirect' => '/admin/petugas/' . $petuga->identifier
        ]);
    }


    public function edit(User $petuga)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
        return view('pages.admin.datapetugas.edit', compact('petuga'));
    }


    public function update(UpdatePetugasRequest $request, User $petuga)
    {
        $petuga->update($request->all());
        return redirect(route('petugas.index'))->withInfo('Data berhasil diubah!');
    }


    public function destroy(User $petuga)
    {
        if (Pembayaran::where('petugas_id', $petuga->id)->count() < 1) {
            $petuga->delete();
            return redirect(route('petugas.index'))->withInfo('Data berhasil dihapus!');
        } else {
            return redirect(route('petugas.index'))->withInfo('Data gagal dihapus!');
        }
    }
}
