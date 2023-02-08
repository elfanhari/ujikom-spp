<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetugasController extends Controller
{
    
    public function index()
    {
        $petuga = User::where('level', 'petugas')->get();

        if(request('search')) {
            $petuga->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('telepon', 'like', '%' . request('search') . '%')
                ->orWhere('username', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')->get();
        }

        return view('pages.admin.datapetugas.index', compact('petuga'));
    }


    public function create()
    {
        return view('pages.admin.datapetugas.create');
    }


    public function store(PetugasRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(9);
        User::create($request->all());
        return redirect(route('petugas.index'))->with('info', 'Data berhasil ditambahkan!');
    }


    public function show(User $petuga)
    {   
        return view('pages.admin.datapetugas.show', compact('petuga'));
    }


    public function edit(User $petuga)
    {
        return view('pages.admin.datapetugas.edit', compact('petuga'));
    }


    public function update(PetugasRequest $request, User $petuga)
    {
        $petuga->update($request->all());
        return redirect(route('petugas.index'))->withInfo('Data berhasil diubah!');
    }


    public function destroy(User $petuga)
    {
        $petuga->delete();
        return redirect(route('petugas.index'))->withInfo('Data berhasil dihapus!');
    }
}
