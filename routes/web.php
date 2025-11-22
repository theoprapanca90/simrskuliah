<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
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
    return view('auth.login');
});

// Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Pengguna
    Route::get('/create_pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/insert_pengguna', [PenggunaController::class, 'store'])->name('pengguna.create');
    Route::delete('/delete_pengguna/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

    // Admin
    Route::get('/create_admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/insert_admin', [AdminController::class, 'store'])->name('admin.create');
    Route::delete('/delete_admin/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    // Dokter
    Route::get('/create_dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::post('/insert_dokter', [DokterController::class, 'store'])->name('dokter.create');
    Route::delete('/delete_dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
    Route::get('/edit_dokter/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::put('/update_dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');

    // Pasien
    Route::get('/create_pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien_inap', [PasienController::class, 'InapPasien'])->name('pasien.index.inap');
    Route::get('/pasien_jalan', [PasienController::class, 'JalanPasien'])->name('pasien.index.jalan');
    Route::post('/insert_pasien', [PasienController::class, 'store'])->name('pasien.create');
    Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::get('/detail_pasien/{id}', [PasienController::class, 'detail'])->name('pasien.detail');

    // Poliklinik
    Route::get('/create_poli', [PoliklinikController::class, 'index'])->name('poli.index');
    Route::post('/insert_poli', [PoliklinikController::class, 'store'])->name('poli.store');
    Route::delete('/delete_poli/{id}', [PoliklinikController::class, 'destroy'])->name('poli.delete');
});

// User Routes
Route::middleware(['auth', 'checkRole:admin,pengguna'])->group(function () {
    // Pengguna
    Route::get('/create_pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/insert_pengguna', [PenggunaController::class, 'store'])->name('pengguna.create');
    Route::delete('/delete_pengguna/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

    // Dokter
    Route::get('/create_dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::post('/insert_dokter', [DokterController::class, 'store'])->name('dokter.create');
    Route::delete('/delete_dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
    Route::get('/edit_dokter/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::put('/update_dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');

    // Pasien
    Route::get('/create_pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien_inap', [PasienController::class, 'InapPasien'])->name('pasien.index.inap');
    Route::get('/pasien_jalan', [PasienController::class, 'JalanPasien'])->name('pasien.index.jalan');
    Route::post('/insert_pasien', [PasienController::class, 'store'])->name('pasien.create');
    Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::get('/detail_pasien/{id}', [PasienController::class, 'detail'])->name('pasien.detail');
});
