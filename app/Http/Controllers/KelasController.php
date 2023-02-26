<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    // Kelas - Index
    public function index()
    {   
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datakelas.index', [
            'kela' => Kelas::with('kompetensikeahlian')->latest()->get(),
            'prodi' => Kompetensikeahlian::with('kelas')->get()
        ]);
    }
    
    // Kelas - Store
    public function store(KelasRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(9);
        Kelas::create($request->all());
        return redirect(route('kelas.index'))->withInfo('Data berhasil ditambahkan!');
    }

    // Kelas - Edit
    public function edit(Kelas $kela)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
        return view('pages.admin.datakelas.edit', [
            'kela' => $kela,
            'kompetensikeahlian' => Kompetensikeahlian::all()
        ]); 
    }

    // Kelas - Update    
    public function update(KelasRequest $request, Kelas $kela)
    {
        $kela->update($request->all());
        return redirect(route('kelas.index'))->withInfo('Data berhasil diubah!');
    }
    
    // Kelas - Destroy
    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return redirect(route('kelas.index'))->withInfo('Data berhasil dihapus!');
    }

}
