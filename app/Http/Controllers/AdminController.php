<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::where('level', 'admin');

        if(request('search')) {
            $admin->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('telepon', 'like', '%' . request('search') . '%')
                ->orWhere('username', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }

        return view('pages.admin.dataadmin.index', [
            'admin' => $admin->latest()->get(),
        ]);
    }

    public function create()
    {
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
        return view('pages.admin.dataadmin.show', [
            'admin' => $admin,
        ] );
    }

    public function edit(User $admin)
    {
        return view('pages.admin.dataadmin.edit', [
            'admin' => $admin,
        ]);
    }

    public function update(AdminRequest $request, User $admin)
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
