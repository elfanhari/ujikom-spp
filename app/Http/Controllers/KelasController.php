<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        if (auth()->user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }

        $kelas = Kelas::latest();

        if(request('search')) {
            $kelas->where('name', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.datakelas.index', [
            'kelas' => $kelas->get(),
            'prodi' => Kompetensikeahlian::get()
        ]);
    }
    
    public function store(KelasRequest $request)
    {
        Kelas::create($request->all());
        return redirect(route('kelas.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    public function edit(Kelas $kelas)
    {
        return view('pages.admin.datakelas.edit', [
            'kelas' => $kelas,
            'kompetensikeahlian' => Kompetensikeahlian::all()
        ]); 
    }

    public function update(KelasRequest $request, $id)
    {
        Kelas::find($id)->update($request->all());
        return redirect(route('kelas.index'))->with('info', 'Data berhasil diubah!');
    }
    
    public function destroy($id)
    {
        Kelas::find($id)->delete();
        return redirect(route('kelas.index'))->with('info', 'Data berhasil dihapus!');
    }

}
