<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::orderBy('id', 'desc');

        if(request('search')) {
            $siswa->where('tahun', 'like', '%' . request('search') . '%')
                ->orWhere('nominal', 'like', '%' . request('search') . '%')
                ->orWhere('nominal', 'like', '%' . request('search') . '%')
                ->orWhere('nominal', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.datasiswa.index', [
            'siswa' => User::where('level', 'siswa')->get(),
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.datasiswa.create', [
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        $create = [
          'level' => 'siswa'
        ];

        $request['password'] = bcrypt($request->password);
        User::create(
            $request->all()
        );
        return redirect(route('siswa.index'))->with('info', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(User $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(User $siswa)
    {
        return view('pages.admin.datasiswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaRequest $request, User $siswa)
    {
        User::find($siswa->id)->update($request->all());
        return redirect(route('siswa.index'))->with('info', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $siswa)
    {
        User::find($siswa->id)->delete();
        return redirect(route('siswa.index'))->with('info', 'Data berhasil dihapus!');
    }
}
