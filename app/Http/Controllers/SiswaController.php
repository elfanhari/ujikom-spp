<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportSiswaRequest;
use App\Http\Requests\SiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
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
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

        return view('pages.admin.datasiswa.index', [
            'siswa' => User::with('kelas')->where('level', 'siswa')->latest()->orderBy('name', 'asc')->get(),
            'kelas' => Kelas::orderBy('name', 'asc')->get(),
            'spp' => Spp::orderBy('tahun', 'asc')->get(),
            'pembayaran' => Pembayaran::all()
        ]);
    }

    // Siswa - Create
    public function create()
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datasiswa.create', [
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    // Siswa - Store
    public function store(SiswaRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(4) . time(). Str::random(5);
        User::create($request->all());
        return redirect(route('siswa.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    // Siswa - Show
    public function show(User $siswa)
    {
        if (auth()->user()->level === 'siswa') { // pembatasan akses selain admin dan petugas
            return view('denied');
        }

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
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datasiswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    // Siswa - Update
    public function update(UpdateSiswaRequest $request, User $siswa)
    {
        $siswa->update($request->all());
        return redirect(route('siswa.index'))->with('info', 'Data berhasil diubah!');
    }

    // Siswa - Delete
    public function destroy(User $siswa)
    {
        if (Pembayaran::where('siswa_id', $siswa->id)->count() < 1) {
            $siswa->delete();
            return redirect(route('siswa.index'))->with('info', 'Data berhasil dihapus!');
        } else {
            return redirect(route('siswa.index'))->withGagal('Data tidak dapat dihapus! Karena <b>' . $siswa->name . ' - ' . $siswa->kelas->name . '</b> Telah melakukan beberapa transaksi!');
        }
        
    }

    // Siswa - Import Data Siswa
    public function import(ImportSiswaRequest $request)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
        $file = $request->file('file');
        if ($file->getClientOriginalExtension() != 'xlsx') {
            return back()->withGagal('Import Gagal! File yang anda masukkan tidak sesuai ketentuan!');
        } else {
            dd('okehh');
        }
        $namaFile = $file->getClientOriginalName();
        $file->move('datasiswa', $namaFile);

        Excel::import(new SiswaImport, public_path('/datasiswa/' . $namaFile));
        return back()->withInfo('Data siswa berhasil di import!');
    }
}