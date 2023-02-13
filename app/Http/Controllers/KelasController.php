<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {

        if (auth()->user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }

        $kela = Kelas::latest();

        if(request('search')) {
            $kela->where('name', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.datakelas.index', [
            'kela' => $kela->get(),
            'prodi' => Kompetensikeahlian::get()
        ]);
    }
    

    public function store(KelasRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(9);
        Kelas::create($request->all());
        return redirect(route('kelas.index'))->withInfo('Data berhasil ditambahkan!');
    }


    public function edit(Kelas $kela)
    {
        return view('pages.admin.datakelas.edit', [
            'kela' => $kela,
            'kompetensikeahlian' => Kompetensikeahlian::all()
        ]); 
    }


    public function update(KelasRequest $request, Kelas $kela)
    {
        $kela->update($request->all());
        return redirect(route('kelas.index'))->withInfo('Data berhasil diubah!');
    }
    

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return redirect(route('kelas.index'))->withInfo('Data berhasil dihapus!');
    }

}
