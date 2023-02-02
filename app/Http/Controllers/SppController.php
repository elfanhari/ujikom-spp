<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::latest();

        if(request('search')) {
            $spp->where('tahun', 'like', '%' . request('search') . '%')
                ->orWhere('nominal', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.dataspp.index', [
            'spp' => $spp->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(SppRequest $request)
    {
        Spp::create($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    public function show(Spp $spp)
    {
        //    
    }

    public function edit(Spp $spp)
    {
        return view('pages.admin.datakelas.edit', [
            'spp' => $spp,
        ]);
    }

    public function update(SppRequest $request, Spp  $spp)
    {   
        Spp::find($spp->id)->update($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil diubah!');
    }

    public function destroy(Spp $spp)
    {
        Spp::find($spp->id)->delete();
        return redirect(route('spp.index'))->with('info', 'Data berhasil dihapus!');
    }
}