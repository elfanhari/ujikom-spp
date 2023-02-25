<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserphotoRequest;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserphotoController extends Controller
{
    public function editPhoto(Request $request, $id)
    {   
        return view('pages.admin.profile.editphoto', [
            'user' => User::find($id),
            'userphoto' => Userphoto::where('user_id', $id)->get(),
            'redirect' => $request->redirect,
            'name' => $request->name
        ]);
    }

    public function storePhoto(UserphotoRequest $request)
    {   
        $redirect = $request->redirect;

        $files = $request->file('files');
        if ($request->hasFile('files')) {
            $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
            $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension                  = $files->getClientOriginalExtension();
            $filenamesimpan             = 'gallery' . time() . '.' . $extension;
            $files->move('gallery', $filenamesimpan);

            Userphoto::create([
                'user_id'       => $request->user_id,
                'url'           => $filenamesimpan,
                'is_featured'   => 0
            ]);
        } 
        return redirect($redirect)->with('info', 'Foto profil berhasil ditambahkan!');
    }

    public function updatePhoto(UserphotoRequest $request)
    {
        $redirect = $request->redirect;

        $files = $request->file('files');
        if ($request->hasFile('files')) {
            // foreach ($files as $file) {
            $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
            $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension                  = $files->getClientOriginalExtension();
            $filenamesimpan             = 'gallery' . time() . '.' . $extension;
            $files->move('gallery', $filenamesimpan);

            $editdata = [
                'user_id'       => $request->user_id,
                'url'            => $filenamesimpan,
            ];

            // }
            Userphoto::where('user_id', $request->user_id)->update($editdata);
        }
        $filegambar = public_path('gallery/'.$request->picture);
        File::delete($filegambar);
        return redirect($redirect)->with('info', 'Foto profil berhasil diperbarui!');
    }

    public function deletePhoto(Request $request)
    {   
        $redirect = $request->redirect;
        
        Userphoto::where('user_id', $request->user_id)->delete();
        $filegambar = public_path('gallery/'.$request->picture);
        File::delete($filegambar);
        return redirect($redirect)->with('info', 'Foto profil berhasil dihapus!');
    }

}
