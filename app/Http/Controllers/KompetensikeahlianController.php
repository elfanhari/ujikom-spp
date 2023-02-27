<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensikeahlianRequest;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class KompetensikeahlianController extends Controller
{
   
    // Prodi - Index
    public function index()
    {   
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
        $prodi = Kompetensikeahlian::latest()->get();
        return view('pages.admin.dataprodi.index', compact('prodi'));
    }


   // Prodi - Create
    public function create()
    {
        // sudah ada di page index.
    }


   // Prodi - Store
    public function store(KompetensikeahlianRequest $request)
    {   
        $request['identifier'] = 'i' . Str::random(9);
        Kompetensikeahlian::create($request->all()); 
        return redirect(route('prodi.index'))->withInfo('Data berhasil ditambahkan!');
    }


   // Prodi - Show
    public function show($id)
    {
        //
    }


    // Prodi - Edit
    public function edit(Kompetensikeahlian $prodi)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
        return view('pages.admin.dataprodi.edit', compact('prodi'));
    }

    
    // Prodi - Update
    public function update(KompetensikeahlianRequest $request, Kompetensikeahlian $prodi)
    {
        $prodi->update($request->all()); 
        return redirect(route('prodi.index'))->withInfo('Data berhasil diperbarui!');
    }


    // Prodi - Destroy
    public function destroy(Kompetensikeahlian $prodi)
    {
        $prodi->delete(); 
        return back()->withInfo('Data berhasil dihapus!');
    }

}