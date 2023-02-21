<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class SiswaNotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.siswa.notifikasi.index', [
            'notifikasi' => Notifikasi::where('penerima_id', auth()->user()->id)->latest()->get(),
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notifikasi $notifikasi)
    {
        return view('pages.siswa.notifikasi.show', [
            'notifikasi' => $notifikasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifikasi $notifikasi)
    {
        $notifikasi->update($request->all());
        return redirect(route('notifikasi.show', $notifikasi));
    }

    public function telahDibaca(Request $request, Notifikasi $notifikasi)
    {
        if ($request->untuk == 'satu') {
            $notifikasi->update($request->all());
            return redirect(route('notifikasi.index'));
        }

        if ($request->untuk == 'semua') {
            Notifikasi::where('penerima_id', $notifikasi->penerima_id)->update([
                'dibaca' => true
            ]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Notifikasi $notifikasi)
    {
        if ($request->untuk == 'satu') {
            $notifikasi->delete();
            return redirect(route('notifikasi.index'));
        }

        if ($request->untuk == 'semua') {
            Notifikasi::where('penerima_id', $notifikasi->penerima_id)->delete();
            return back();
        }
    }
}
