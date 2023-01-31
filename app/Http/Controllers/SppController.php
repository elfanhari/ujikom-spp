<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::latest();

        if(request('search')) {
            $spp->where('tahun', 'like', '%' . request('search') . '%')
                ->orWhere('nominal', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.dataspp.index', [
            'spp' => $spp->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SppRequest $request)
    {
        Spp::create($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $spp)
    {
        return view('pages.admin.datakelas.edit', [
            'spp' => $spp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(SppRequest $request, Spp  $spp)
    {   
        Spp::find($spp->id)->update($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spp $spp)
    {
        Spp::find($spp->id)->delete();
        return redirect(route('spp.index'))->with('info', 'Data berhasil dihapus!');
    }
}
