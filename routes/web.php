<?php

use App\Http\Controllers\DashboardController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/menu-karyawan', [UserController::class, 'index'])->name("menu-karyawan");
    Route::resource('users', UserController::class);
    Route::post('/postidentitas', [UserController::class, 'storeIdentitas']);
    Route::post('/postpendidikan', [UserController::class, 'storePendidikan']);
    Route::post('/postpekerjaan', [UserController::class, 'storePekerjaan']);
    Route::post('/postsertifikasi', [UserController::class, 'storeSertifikasi']);

    Route::resource('penggajian', PenggajianController::class);

    Route::resource('presensi', PresensiController::class);

    Route::resource('kelola-user', KelolaUserController::class);
    
});
