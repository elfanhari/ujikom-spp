<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SppController extends Controller
{
    
    public function index()
    {
        $spp = Spp::latest()->get();

        return view('pages.admin.dataspp.index', [
            'spp' => $spp
        ]);
    }

    public function create()
    {
        //
    }

    public function store(SppRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(9);
        Spp::create($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    public function show(Spp $spp)
    {
        //    
    }

    public function edit(Spp $spp)
    {
        return view('pages.admin.dataspp.edit', [
            'spp' => $spp,
        ]);
    }

    public function update(SppRequest $request, Spp  $spp)
    {   
        $spp->update($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil diubah!');
    }

    public function destroy(Spp $spp)
    {
        $spp->delete();
        return redirect(route('spp.index'))->with('info', 'Data berhasil dihapus!');
    }
}