<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserphotoController extends Controller
{
    public function editPhoto()
    {   
        return view('pages.admin.profile.editphoto', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'userphoto' => Userphoto::where('user_id', auth()->user()->id)->get(),
            DB
        ]);
    }

    public function storePhoto(Request $request)
    {   
        $files = $request->file('files');
        if ($request->hasFile('files')) {
            // foreach ($files as $file) {
            $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
            $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension                  = $files->getClientOriginalExtension();
            $filenamesimpan             = 'gallery' . time() . '.' . $extension;
            $files->move('gallery', $filenamesimpan);

            Userphoto::create([
                'user_id'       => $request->user_id,
                'url'               => $filenamesimpan,
                'is_featured'       => 0
            ]);
            // }
        }
        return redirect(route('profile.index'))->with('info', 'Foto profil anda berhasil ditambahkan!');
    }

    public function updatePhoto(Request $request)
    {
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
        return redirect(route('profile.index'))->with('info', 'Foto profil anda berhasil diperbarui!');
    }

    public function deletePhoto(Request $request)
    {   
        Userphoto::where('user_id', $request->user_id)->delete();
        $filegambar = public_path('gallery/'.$request->picture);
        File::delete($filegambar);
        return redirect(route('profile.index'))->with('info', 'Foto profil anda berhasil dihapus!');
    }
}
