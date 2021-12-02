<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'checkStatusLogin']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'authLogin']);
Route::post('/postlogout', [LoginController::class, 'authLogout']);
Route::get('/login/filter/kegiatan/{tgl}', [LoginController::class, 'filterkegiatanlogin']);

Route::get('kegiatan/download/file/{id}', [KegiatanController::class, 'downloadFile'])->name('download-file');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['is_kabag_SDM'], ['is_staf_SDM'], ['is_karyawan'])->group(function () {
    Route::get('/menu-karyawan', [UserController::class, 'index'])->name("menu-karyawan");
    Route::resource('users', UserController::class);
    Route::post('/postidentitas', [UserController::class, 'storeIdentitas']);
    Route::delete('/delete/identitas/{id}', [UserController::class, 'destroyIdentitas'])->name('delete.identitas');
    Route::post('/postpendidikan', [UserController::class, 'storePendidikan']);
    Route::delete('/delete/pendidikan/{id}', [UserController::class, 'destroyPendidikan'])->name('delete.pendidikan');
    Route::post('/postpekerjaan', [UserController::class, 'storePekerjaan']);
    Route::delete('/delete/pekerjaan/{id}', [UserController::class, 'destroyPekerjaan'])->name('delete.pekerjaan');
    Route::post('/postsertifikasi', [UserController::class, 'storeSertifikasi']);
    Route::delete('/delete/sertifikasi/{id}', [UserController::class, 'destroySertifikasi'])->name('delete.sertifikasi');
});

Route::middleware(['is_kabag_SDM'])->group(function () {
    Route::resource('penggajian', PenggajianController::class);
});

Route::middleware(['is_kabag_SDM'], ['is_staf_SDM'])->group(function () {
    Route::resource('presensi', PresensiController::class);
    Route::get('/data-cetak-presensi/{tglawal}/{tglakhir}', [PresensiController::class, 'cetakPresensiPertanggal']);
    Route::get('/filter-presensi/{filter1}/{filter2}/{kode}', [PresensiController::class, 'filterPresensi']);
});

Route::middleware(['is_kabag_SDM'], ['is_staf_SDM'])->group(function () {
    Route::resource('kegiatan', KegiatanController::class);
    Route::get('/filter/kegiatan/{tgl}', [KegiatanController::class, 'filterKegiatan']);    
});

Route::middleware(['is_admin'])->group(function () {
    Route::resource('kelolauser', KelolaUserController::class);
});