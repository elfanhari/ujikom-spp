<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Kompetensikeahlian;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class KelasController extends Controller
{
    // Kelas - Index
    public function index()
    {   
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.datakelas.index', [
            'kela' => Kelas::with('kompetensikeahlian')->latest()->orderBy('name', 'asc')->get(),
            'prodi' => Kompetensikeahlian::with('kelas')->latest()->orderBy('name', 'asc')->get(),
            'user' => User::all()
        ]);
    }
    
    // Kelas - Store
    public function store(KelasRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(4) . time(). Str::random(5);
        Kelas::create($request->all());
        return redirect(route('kelas.index'))->withInfo('Data berhasil ditambahkan!');
    }

    // Kelas - Show
    public function show(Kelas $kela)
    {
        return view('pages.admin.datakelas.show', [
            'siswa' => User::where('kelas_id', $kela->id)->orderBy('name', 'ASC')->get(),
            'kelas' => $kela,
            'semuakelas' => Kelas::orderBy('name', 'ASC')->get(),
            'semuaspp' => Spp::orderBy('tahun', 'ASC')->get()
        ]);
    }


    // Kelas - Edit
    public function edit(Kelas $kela)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }
        
        return view('pages.admin.datakelas.edit', [
            'kela' => $kela,
            'kompetensikeahlian' => Kompetensikeahlian::all()
        ]); 
    }

    // Kelas - Update    
    public function update(KelasRequest $request, Kelas $kela)
    {
        $kela->update($request->all());
        return redirect(route('kelas.index'))->withInfo('Data berhasil diubah!');
    }
    
    // Kelas - Destroy
    public function destroy(Kelas $kela)
    {
        if (User::where('kelas_id', $kela->id)->count() < 1) {
            $kela->delete();
            return redirect(route('kelas.index'))->withInfo('Data berhasil dihapus!');
        } else {
            return redirect(route('kelas.index'))->withGagal('Data tidak dapat dihapus! Karena ada beberapa siswa dengan <b> Kelas - ' . $kela->name . '</b>!');
        }
       
    }

    // Kelas - Naik Kelas
    public function naikKelas(Request $request)
    {
        $kelasBaru = $request->validate(['kelas_id' => 'required']);
        User::where('kelas_id', $request->kelasSebelumnya)->update($kelasBaru);
        return redirect()->route('kelas.index')->withInfo('Siswa pada kelas tersebut berhasil dinaikkan kelas!');
    }

    // Kelas - Ganti SPP
    public function gantiSpp(Request $request)
    {
        $sppBaru = $request->validate(['spp_id' => 'required']);
        User::where('kelas_id', $request->kelasSebelumnya)->where('spp_id', $request->sppSebelumnya)->update($sppBaru);
        return back()->withInfo('SPP siswa pada kelas ini berhasil diperbarui!');
    }

}
