<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view ('Home', [
        "title" => "HOME",
        "active"=>'home',
    ]);
});


//  ABSENSI
Route::get('/absensi', [App\Http\Controllers\AbsensiController::class, 'index'])->name('absensi.index')->middleware('auth');
Route::get('/absensi/create', [App\Http\Controllers\AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/create', [App\Http\Controllers\AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/{id}/edit', [App\Http\Controllers\AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('/absensi/{id}', [App\Http\Controllers\AbsensiController::class, 'update'])->name('absensi.update');
Route::delete('/absensi/{id}', [App\Http\Controllers\AbsensiController::class, 'destroy'])->name('absensi.destroy');


//  KELAS
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index')->middleware('auth');
Route::get('/kelas/create', [App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/create', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/{id}/edit', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/{id}', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');


//  GURU
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index')->middleware('auth');
Route::get('/guru/create', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/create', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/{id}/edit', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{id}', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.destroy');


//  PELAJARAN
Route::get('/pelajaran', [App\Http\Controllers\PelajaranController::class, 'index'])->name('pelajaran.index')->middleware('auth');
Route::get('/pelajaran/create', [App\Http\Controllers\PelajaranController::class, 'create'])->name('pelajaran.create');
Route::post('/pelajaran/create', [App\Http\Controllers\PelajaranController::class, 'store'])->name('pelajaran.store');
Route::get('/pelajaran/{id}/edit', [App\Http\Controllers\PelajaranController::class, 'edit'])->name('pelajaran.edit');
Route::put('/pelajaran/{id}', [App\Http\Controllers\PelajaranController::class, 'update'])->name('pelajaran.update');
Route::delete('/pelajaran/{id}', [App\Http\Controllers\PelajaranController::class, 'destroy'])->name('pelajaran.destroy');



//  PELANGGARAN
Route::get('/pelanggaran', [App\Http\Controllers\PelanggaranController::class, 'index'])->name('pelanggaran.index')->middleware('auth');
Route::get('/pelanggaran/create', [App\Http\Controllers\PelanggaranController::class, 'create'])->name('pelanggaran.create');
Route::post('/pelanggaran/create', [App\Http\Controllers\PelanggaranController::class, 'store'])->name('pelanggaran.store');
Route::get('/pelanggaran/{id}/edit', [App\Http\Controllers\PelanggaranController::class, 'edit'])->name('pelanggaran.edit');
Route::put('/pelanggaran/{id}', [App\Http\Controllers\PelanggaranController::class, 'update'])->name('pelanggaran.update');
Route::delete('/pelanggaran/{id}', [App\Http\Controllers\PelanggaranController::class, 'destroy'])->name('pelanggaran.destroy');



//  DETAIL PELANGGARAN
Route::get('/detailpelanggaran', [App\Http\Controllers\DetailPelanggaranController::class, 'index'])->name('detailpelanggaran.index')->middleware('auth');
Route::get('/detailpelanggaran/create', [App\Http\Controllers\DetailPelanggaranController::class, 'create'])->name('detailpelanggaran.create');
Route::post('/detailpelanggaran/create', [App\Http\Controllers\DetailPelanggaranController::class, 'store'])->name('detailpelanggaran.store');
Route::get('/detailpelanggaran/{id}/edit', [App\Http\Controllers\DetailPelanggaranController::class, 'edit'])->name('detailpelanggaran.edit');
Route::put('/detailpelanggaran/{id}', [App\Http\Controllers\DetailPelanggaranController::class, 'update'])->name('detailpelanggaran.update');
Route::delete('/detailpelanggaran/{id}', [App\Http\Controllers\DetailPelanggaranController::class, 'destroy'])->name('detailpelanggaran.destroy');

