<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdatePetugasRequest;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    // Controller CRUD Data Admin

    public function index()
    {   
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.dataadmin.index', [
            'admin' => User::where('level', 'admin')->latest()->get(),
        ]);
    }


    public function create()
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.dataadmin.create');
    }


    public function store(AdminRequest $request)
    {
        $request['identifier'] = 'i' . Str::random(9);
        $request['password'] = bcrypt($request->password);
        User::create(
            $request->all()
        );
        return redirect(route('admin.index'))->with('info', 'Data berhasil ditambahkan!');
    }


    public function show(User $admin)
    {   
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.dataadmin.show', [
            'admin' => $admin,
            'userphoto' => Userphoto::where('user_id', $admin->id)->get(),
            'redirect' => '/admin/admin/' . $admin->identifier
        ] );
    }


    public function edit(User $admin)
    {
        if (auth()->user()->level !== 'admin') { // pembatasan akses selain admin
            return view('denied');
        }

        return view('pages.admin.dataadmin.edit', [
            'admin' => $admin,
        ]);
    }


    public function update(UpdateAdminRequest $request, User $admin)
    {
        $admin->update($request->all());
        return redirect(route('admin.index'))->with('info', 'Data berhasil diubah!');
    }

    
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect(route('admin.index'))->with('info', 'Data berhasil dihapus!');
    }
}
