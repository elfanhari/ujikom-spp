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
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.dataspp.index', [
            'spp' => Spp::latest()->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(SppRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(4) . time(). Str::random(5);
        Spp::create($request->all());
        return redirect(route('spp.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    public function show(Spp $spp)
    {
        //    
    }

    public function edit(Spp $spp)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
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