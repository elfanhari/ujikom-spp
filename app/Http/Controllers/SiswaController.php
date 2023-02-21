<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imports\SiswaImport;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{

    // Siswa - Index
    public function index()
    {
        if (auth()->user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }

        return view('pages.admin.datasiswa.index', [
            'siswa' => User::where('level', 'siswa')->latest()->get(),
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
        $request['identifier'] = 'i' . Str::random(9);
        User::create($request->all());
        return redirect(route('siswa.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    // Siswa - Show
    public function show(User $siswa)
    {   

        return view('pages.admin.datasiswa.show', [
            'siswa' => $siswa,
            'historysiswa' => Pembayaran::where('siswa_id', $siswa->id)->latest()->get(),
            'userphoto' => Userphoto::where('user_id', $siswa->id)->get(),
            'redirect' => '/admin/siswa/' . $siswa->identifier
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
        $siswa->update($request->all());
        return redirect(route('siswa.index'))->with('info', 'Data berhasil diubah!');
    }

    // Siswa - Delete
    public function destroy(User $siswa)
    {
        $siswa->delete();
        return redirect(route('siswa.index'))->with('info', 'Data berhasil dihapus!');
    }

    // Siswa - Import Data Siswa
    public function import(Request $request)
    {
         $file = $request->file('file');
         $namaFile = $file->getClientOriginalName();
         $file->move('datasiswa', $namaFile);

         Excel::import(new SiswaImport, public_path('/datasiswa/' . $namaFile));
         return back()->withInfo('Data siswa berhasil di import!');
    }
}