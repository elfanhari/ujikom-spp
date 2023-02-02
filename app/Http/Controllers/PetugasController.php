<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    // 
    public function index()
    {
        $petugas = User::where('level', 'petugas');

        if(request('search')) {
            $petugas->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('telepon', 'like', '%' . request('search') . '%')
                ->orWhere('username', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.datapetugas.index', [
            'petugas' => $petugas->get(),
        ]);
    }

    public function create()
    {
        return view('pages.admin.datapetugas.create');
    }

    public function store(PetugasRequest $request)
    {
        // dd($request->all());
        $request['password'] = bcrypt($request->password);
        User::create(
            $request->all()
        );
        return redirect(route('petugas.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    public function show(User $petuga)
    {   
        return view('pages.admin.datapetugas.show', [
            'petugas' => $petuga,
        ] );
    }

    public function edit(User $petuga)
    {
        return view('pages.admin.datapetugas.edit', [
            'petugas' => $petuga,
        ]);
    }

    public function update(PetugasRequest $request, User $petuga)
    {
        User::find($petuga->id)->update($request->all());
        return redirect(route('petugas.index'))->with('info', 'Data berhasil diubah!');
    }

    public function destroy(User $petuga)
    {
        User::find($petuga->id)->delete();
        return redirect(route('petugas.index'))->with('info', 'Data berhasil dihapus!');
    }
}
