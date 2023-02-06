<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    // Siswa - Index
    public function index()
    {
        if (auth()->user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }

        $siswa = User::with('kelas')->where('level', 'siswa');

        if(request('search')) {
            $siswa->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('kelas_id', 'like', '%' . request('search') . '%')
                ->orWhere('spp_id', 'like', '%' . request('search') . '%')
                ->orWhere('nisn', 'like', '%' . request('search') . '%')
                ->orWhere('nis', 'like', '%' . request('search') . '%')
                ->orWhere('telepon', 'like', '%' . request('search') . '%')
                ->orWhere('alamat', 'like', '%' . request('search') . '%')
                ->orWhere('username', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.datasiswa.index', [
            'siswa' => $siswa->get(),
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    // Siswa - Create
    public function create()
    {
        return view('pages.admin.datasiswa.create', [
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]); 
    }

    // Siswa - Store
    public function store(SiswaRequest $request)
    {
        $request['password'] = bcrypt($request->password);
        User::create(
            $request->all()
        );
        return redirect(route('siswa.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    // Siswa - Store
    public function show(User $siswa)
    {   
        return view('pages.admin.datasiswa.show', [
            'siswa' => $siswa,
        ]);
    }

    // Siswa - Edit
    public function edit(User $siswa)
    {
        return view('pages.admin.datasiswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    // Siswa - Update
    public function update(SiswaRequest $request, User $siswa)
    {
        User::find($siswa->id)->update($request->all());
        return redirect(route('siswa.index'))->with('info', 'Data berhasil diubah!');
    }

    // Destroy - Delete
    public function destroy(User $siswa)
    {
        User::find($siswa->id)->delete();
        return redirect(route('siswa.index'))->with('info', 'Data berhasil dihapus!');
    }
}