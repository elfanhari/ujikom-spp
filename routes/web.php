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
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaShowController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\UserphotoController;
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

Route::group(['middleware' => ['auth']], function(){

    Route::view('/petugas', 'pages.petugas.dashboard.index')->name('petugas.dashboard'); // PETUGAS - Dashboard
    Route::view('/siswa', 'pages.siswa.dashboard.index')->name('siswa.dashboard'); // SISWA - Dashboard

    Route::prefix('admin')->group(function () {

        Route::get('/', DashboardController::class)->name('admin.dashboard');
        
        Route::resource('/prodi', KompetensikeahlianController::class); // ADMIN - Kompetensi Keahlian
    
        Route::name('kelas.')->group(function() {   // ADMIN - Data Kelas | Prefix Route Name
            Route::get('/kelas', [KelasController::class, 'index'])->name('index'); //name('kelas.index'), etc..
            Route::post('/kelas', [KelasController::class, 'store'])->name('store');
            Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('edit');
            Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('update');
            Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('destroy');
        });
    
        Route::resource('/spp', SppController::class);
    
        Route::resource('/siswa', SiswaController::class);
        Route::get('/siswa/{siswa:username}', [SiswaController::class, 'show'])->name('siswa.show');
        Route::get('/siswa/{siswa:username}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        
        Route::resource('/petugas', PetugasController::class);
        Route::get('/petugas/{petuga:username}', [PetugasController::class, 'show'])->name('petugas.show');
        Route::get('/petugas/{petuga:username}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
        
        Route::resource('/admin', AdminController::class);
        Route::get('/admin/{admin:username}', [AdminController::class, 'show'])->name('admin.show');
        Route::get('/admin/{admin:username}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    
        Route::resource('/pembayaran', PembayaranController::class);
        
        Route::get('entri', [PembayaranController::class, 'create'])->name('entri.create');

        Route::resource('/history', HistoryController::class);
        
        Route::resource('/laporan', LaporanController::class);

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
        Route::get('/profile/password-edit', [ProfileController::class, 'editPassword'])->name('password-user.edit');
        Route::put('/profile/password-update', [ProfileController::class, 'updatePassword'])->name('password-user.update');
        Route::get('/profile/photo-edit', [UserphotoController::class, 'editPhoto'])->name('photo-user.edit');
        Route::post('/profile/photo-store', [UserphotoController::class, 'storePhoto'])->name('photo-user.store');
        Route::put('/profile/photo-update', [UserphotoController::class, 'updatePhoto'])->name('photo-user.update');
        Route::delete('/profile/photo-delete', [UserphotoController::class, 'deletePhoto'])->name('photo-user.delete');

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
    
Route::prefix('siswa')->group(function () {

    Route::get('/history', function() {
        return view('pages.siswa.history.index');
    });

});


});


