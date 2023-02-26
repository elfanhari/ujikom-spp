<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserphotoRequest;
use App\Models\User;
use App\Models\Userphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SiswaProfileController extends Controller
{

    public function index()
    {
        if (auth()->user()->level !== 'siswa') {return view('denied');} // Pembatasan Akses Selain Siswa

        return view('pages.siswa.profile.index', [
            'user' => auth()->user(),
            'redirect' => '/siswa/profile',
            'userphoto' => Userphoto::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->all());
        return redirect(route('siswaprofile.index'))->with('info', 'Data berhasil diubah!');
    }

    public function editPassword()
    {
        if (auth()->user()->level !== 'siswa') {return view('denied');} // Pembatasan Akses Selain Siswa

        return view('pages.siswa.profile.editpassword');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => $request->password]);
            return redirect()->route('siswaprofile.index')->with('info', 'Password anda berhasil diperbarui!');
        }

        // Jika password sebelumnya salah, berikan pesan validasi
        throw ValidationException::withMessages([
            'current_password' => 'Password anda sebelumnya tidak sesuai',
        ]);
    }

    public function editPhoto(Request $request)
    {
        if (auth()->user()->level !== 'siswa') {return view('denied');} // Pembatasan Akses Selain Siswa

        return view('pages.siswa.profile.editphoto', [
            'user' => User::where('id', auth()->user()->id)->first(),
            'userphoto' => Userphoto::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function storePhoto(UserphotoRequest $request)
    {
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
        return redirect(route('siswaprofile.index'))->with('info', 'Foto profil anda berhasil ditambahkan!');
    }

    public function updatePhoto(UserphotoRequest $request)
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
        $filegambar = public_path('gallery/' . $request->picture);
        File::delete($filegambar);
        return redirect(route('siswaprofile.index'))->with('info', 'Foto profil anda berhasil diperbarui!');
    }

    public function deletePhoto(Request $request)
    {
        Userphoto::where('user_id', $request->user_id)->delete();
        $filegambar = public_path('gallery/' . $request->picture);
        File::delete($filegambar);
        return redirect(route('siswaprofile.index'))->with('info', 'Foto profil anda berhasil dihapus!');
    }
}
