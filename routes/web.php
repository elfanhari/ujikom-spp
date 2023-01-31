<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KompetensikeahlianController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
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
});



// Route::get('/adm')

Route::prefix('admin')->group(function () {

    Route::view('/', 'pages.admin.dashboard.index')->name('admin.dashboard'); // ADMIN - Dashboard

    Route::resource('/prodi', KompetensikeahlianController::class); // ADMIN - Kompetensi Keahlian

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::resource('/spp', SppController::class);

    Route::resource('/siswa', SiswaController::class);

});