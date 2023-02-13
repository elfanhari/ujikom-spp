<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KompetensikeahlianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\SiswaProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\SiswaEntriController;
use App\Http\Controllers\SiswaHistoryController;
use App\Http\Controllers\SiswaNotifikasiController;
use App\Http\Controllers\SiswaPembayaranController;
use App\Http\Controllers\SiswaShowController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\UserphotoController;
use App\Models\Pembayaran;
use App\Models\Userphoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/loginadmin', [AuthController::class, 'pageLoginAdmin'])->name('loginadmin.page')->middleware('guest');
Route::post('/loginadmin', [AuthController::class, 'cekLoginAdmin'])->name('loginadmin.check')->middleware('guest');

// ADMIN DAN PETUGAS
Route::group(['middleware' => ['auth']], function(){
    
    Route::view('/petugas', 'pages.petugas.dashboard.index')->name('petugas.dashboard'); // PETUGAS - Dashboard
    Route::view('/siswa', 'pages.siswa.dashboard.index')->name('siswa.dashboard'); // SISWA - Dashboard
    
    Route::prefix('admin')->group(function () {
        
        Route::get('/', DashboardController::class)->name('admin.dashboard');        
        Route::resource('/prodi', KompetensikeahlianController::class); // ADMIN - Kompetensi Keahlian
        Route::resource('/kelas', KelasController::class);
        Route::resource('/spp', SppController::class);
        Route::resource('/petugas', PetugasController::class);
        Route::resource('/siswa', SiswaController::class);
        Route::resource('/admin', AdminController::class);
        Route::resource('/pembayaran', PembayaranController::class);
        Route::get('/entri', [PembayaranController::class, 'create'])->name('entri.create');
        Route::resource('/history', HistoryController::class);
        Route::resource('/laporan', LaporanController::class);

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
        Route::get('/profile/password-edit', [ProfileController::class, 'editPassword'])->name('password-user.edit');
        Route::put('/profile/password-update', [ProfileController::class, 'updatePassword'])->name('password-user.update');
        Route::get('/photo-edit/{users:id}', [UserphotoController::class, 'editPhoto'])->name('photo-user.edit');
        Route::post('/photo-store', [UserphotoController::class, 'storePhoto'])->name('photo-user.store');
        Route::put('/photo-update', [UserphotoController::class, 'updatePhoto'])->name('photo-user.update');
        Route::delete('/photo-delete', [UserphotoController::class, 'deletePhoto'])->name('photo-user.delete');

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });

    // SISWA
    // Route::prefix('siswa')->group(function () {
        
    //     Route::resource('/entri', SiswaEntriController::class);
    //     Route::get('/beranda', SiswaDashboardController::class);

    //     Route::resource('/riwayat', SiswaHistoryController::class);

    //     Route::resource('/notifikasi', SiswaNotifikasiController::class);

    //     Route::get('/profile', [SiswaProfileController::class, 'index'])->name('siswaprofile.index');
    //     Route::put('/profile', [SiswaProfileController::class, 'updateProfile'])->name('update-siswa.profile');
    //     Route::get('/profile/password-edit', [SiswaProfileController::class, 'editPassword'])->name('password-siswa.edit');
    //     Route::put('/profile/password-update', [SiswaProfileController::class, 'updatePassword'])->name('password-siswa.update');
    //     Route::get('/photo-edit/{users:id}', [SiswaProfileController::class, 'editPhoto'])->name('photo-siswa.edit');
    //     Route::post('/photo-store', [SiswaProfileController::class, 'storePhoto'])->name('photo-siswa.store');
    //     Route::put('/photo-update', [SiswaProfileController::class, 'updatePhoto'])->name('photo-siswa.update');
    //     Route::delete('/photo-delete', [SiswaProfileController::class, 'deletePhoto'])->name('photo-siswa.delete');

    // });
});

