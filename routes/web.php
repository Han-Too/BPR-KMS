<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\SOPController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\sideBarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AksesPelaporanPeraturan;
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
Route::get('/login/filter/peraturan/{tgl}', [LoginController::class, 'filterperaturanlogin']);
Route::get('/login/filter/sop/{tgl}', [LoginController::class, 'filtersoplogin']);

Route::get('kegiatan/download/file/{id}', [KegiatanController::class, 'downloadFile'])->name('download-file');
Route::get('peraturan/download/file/{id}', [PeraturanController::class, 'downloadFile'])->name('download-file');
Route::get('sop/download/file/{id}', [SOPController::class, 'downloadFile'])->name('download-file');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth','akses_kelola_data_karyawan'])->group(function () {
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


Route::middleware(['auth', 'is_kabag_SDM'])->group(function () {
    Route::resource('penggajian', PenggajianController::class);
    Route::resource('kelolauser', KelolaUserController::class);
});



// Route::middleware(['auth', 'akses_presensi'])->group(function () {
//     Route::resource('presensi', PresensiController::class);
//     Route::get('/data-cetak-presensi/{tglawal}/{tglakhir}', [PresensiController::class, 'cetakPresensiPertanggal']);
//     Route::get('/filter-presensi-harian/{tgl1}/{tgl2}', [PresensiController::class, 'filterPresensiHarian']);
//     Route::get('/filter-presensi-bulanan/{filter1}/{filter2}', [PresensiController::class, 'filterPresensiBulanan']);
// });

Route::middleware(['auth', 'akses_pelaporan_kegiatan'])->group(function () {
    Route::resource('kegiatan', KegiatanController::class);
    Route::get('/filter/kegiatan/{tgl}', [KegiatanController::class, 'filterKegiatan']);    
});

Route::middleware(['auth',  'akses_pelaporan_peraturan'])->group(function () {
    Route::resource('peraturan', PeraturanController::class);
    Route::get('/filter/peraturan/{tgl}', [PeraturanController::class, 'filterPeraturan']);
});

Route::middleware(['auth',  'akses_pelaporan_sop'])->group(function () {
    Route::resource('sop', SopController::class);
    Route::get('/filter/sop/{tgl}', [SopController::class, 'filterSOP']);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('kelolauser', KelolaUserController::class);
});

Route::middleware(['auth',  'akses_pelaporan_departemen'])->group(function () {
    Route::resource('departemen', DepartemenController::class);
});

?>