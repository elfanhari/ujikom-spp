<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensikeahlianRequest;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;

class KompetensikeahlianController extends Controller
{
   
    public function index()
    {   
        $prodi = Kompetensikeahlian::latest();

        if(request('search')) {
            $prodi->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('singkatan', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.dataprodi.index', [
            'prodi' => $prodi->get(),
        ]);
    }

   
    public function create()
    {
        // Sudah ada di Page Index.
    }

   
    public function store(KompetensikeahlianRequest $request)
    {   
        Kompetensikeahlian::create($request->all()); 
        return redirect(route('prodi.index'))->with('info','Data berhasil ditambahkan!');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit(Kompetensikeahlian $kompetensikeahlian, $id)
    {
        return view('pages.admin.dataprodi.edit', [
            // 'prodi' => $kompetensikeahlian,
            'prodi' => Kompetensikeahlian::whereId($id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Kompetensikeahlian::find($id)->update($request->all()); 
        return redirect(route('prodi.index'))->with('info','Data berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        Kompetensikeahlian::find($id)->delete(); 
        return back()->with('info','Data berhasil dihapus!');
    }
}
