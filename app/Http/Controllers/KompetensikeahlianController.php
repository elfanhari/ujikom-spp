<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensikeahlianRequest;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;

class KompetensikeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Sudah ada di Page Index.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KompetensikeahlianRequest $request)
    {   
        Kompetensikeahlian::create($request->all()); 
        return redirect(route('prodi.index'))->with('info','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kompetensikeahlian $kompetensikeahlian, $id)
    {
        return view('pages.admin.dataprodi.edit', [
            // 'prodi' => $kompetensikeahlian,
            'prodi' => Kompetensikeahlian::whereId($id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kompetensikeahlian::find($id)->update($request->all()); 
        return redirect(route('prodi.index'))->with('info','Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kompetensikeahlian::find($id)->delete(); 
        return back()->with('info','Data berhasil dihapus!');
    }
}
