<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensikeahlianRequest;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class KompetensikeahlianController extends Controller
{
   
    public function index()
    {   
        if (auth()->user()->level !== 'admin') { // Pembatasan Akses Selain Admin
            return view('denied');
        }
        
        $prodi = Kompetensikeahlian::latest()->get();

        if(request('search')) {
            $prodi->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('singkatan', 'like', '%' . request('search') . '%')->get();
        }

        return view('pages.admin.dataprodi.index', compact('prodi'));
    }

   
    public function create()
    {
        // Sudah ada di Page Index.
    }

   
    public function store(KompetensikeahlianRequest $request)
    {   
        $request['identifier'] = 'i' . Str::random(9);
        Kompetensikeahlian::create($request->all()); 
        return redirect(route('prodi.index'))->withInfo('Data berhasil ditambahkan!');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit(Kompetensikeahlian $prodi)
    {
        return view('pages.admin.dataprodi.edit', compact('prodi'));
    }

    
    public function update(KompetensikeahlianRequest $request, Kompetensikeahlian $prodi)
    {
        $prodi->update($request->all()); 
        return redirect(route('prodi.index'))->withInfo('Data berhasil diperbarui!');
    }

    
    public function destroy(Kompetensikeahlian $prodi)
    {
        $prodi->delete(); 
        return back()->withInfo('Data berhasil dihapus!');
    }
}