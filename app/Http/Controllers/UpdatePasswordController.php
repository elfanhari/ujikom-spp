<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    public function edit(User $users)
    {
        return view('pages.admin.updatepassword.edit',[
            'user' => $users
        ]);
    }

    public function update(Request $request, User $users)
    {
        $newPassword = $request->validate([
            'password' => 'required|min:8'
        ]);

        $users->update($newPassword);
        return redirect($request->redirect)->with('info', 'Password berhasil diperbarui!');
    }
}
