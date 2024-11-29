<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\GuruKelasMapelController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return view('index');
// })->name('dashboard');

Route::get('/siswa', [SiswaController::class, 'index'])->name('dashboard');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

Route::get('/siswa-by-kelas', [KelasController::class, 'listKelasDenganSiswa'])->name('siswa.kelas');
Route::get('/guru-by-kelas', [KelasController::class, 'listKelasDenganGuru'])->name('guru.kelas');
Route::get('/siswa-guru-by-kelas', [KelasController::class, 'listKelasDenganSiswaDanGuru'])->name('siswaguru.kelas');
Route::get('/kelas-data', [KelasController::class, 'listKelasDenganSiswaDanGuru'])->name('listKelasDenganSiswaDanGuru');


Route::get('/guru_kelas_mapel', [GuruKelasMapelController::class, 'index'])->name('guru_kelas_mapel.index');
Route::post('/guru_kelas_mapel', [GuruKelasMapelController::class, 'store'])->name('guru_kelas_mapel.store');
Route::get('/guru_kelas_mapel/{id}/edit', [GuruKelasMapelController::class, 'edit'])->name('guru_kelas_mapel.edit');
Route::put('/guru_kelas_mapel/{id}', [GuruKelasMapelController::class, 'update'])->name('guru_kelas_mapel.update');
Route::delete('/guru_kelas_mapel/{id}', [GuruKelasMapelController::class, 'destroy'])->name('guru_kelas_mapel.destroy');

Route::get('/pelajaran', [MataPelajaranController::class, 'index'])->name('pelajaran.index');
Route::post('/pelajaran', [MataPelajaranController::class, 'store'])->name('pelajaran.store');
Route::delete('/pelajaran/{id}', [MataPelajaranController::class, 'destroy'])->name('pelajaran.destroy');

Route::get('/', [AuthenticatedSessionController::class, 'create']);

// Route::get('/dashboard2', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard-breeze');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';
