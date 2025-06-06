<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [\App\Http\Controllers\GuestController::class, 'index'])->name('index');
Route::get('/destinasi', [\App\Http\Controllers\GuestController::class, 'destinasi'])->name('destinasi');
Route::get('/destinasi/detail/{slug}', [\App\Http\Controllers\GuestController::class, 'detailDestinasi'])->name('destinasi.detail');
Route::get('/penginapan', [\App\Http\Controllers\GuestController::class, 'penginapan'])->name('penginapan');
Route::get('/penginapan/detail/{slug}', [\App\Http\Controllers\GuestController::class, 'detailPenginapan'])->name('penginapan.detail');
Route::get('/transportasi', [\App\Http\Controllers\GuestController::class, 'transportasi'])->name('transportasi');
Route::get('/transportasi/detail/{slug}', [\App\Http\Controllers\GuestController::class, 'detailTransportasi'])->name('transportasi.detail');
Route::get('/umkm', [\App\Http\Controllers\GuestController::class, 'umkm'])->name('umkm');
Route::get('/umkm/detail/{slug}', [\App\Http\Controllers\GuestController::class, 'detailUmkm'])->name('umkm.detail');
Route::get('/template', [\App\Http\Controllers\LandingPageController::class, 'index'])->name('template');

// auth
Route::get('/login', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\CustomerController::class, 'login'])->name('login');
Route::get('/register', [\App\Http\Controllers\CustomerController::class, 'register']);
Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'registerProccess'])->name('register');
Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');

//dashboard
Route::get('/user/dashboard', [CustomerController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');

//penginapan
Route::get('/user/penginapan', [CustomerController::class, 'penginapan'])->name('user.penginapan')->middleware('auth');
Route::get('/user/penginapan/detail/{slug}', [CustomerController::class, 'penginapanDetail'])->name('user.penginapan.detail')->middleware('auth');
Route::post('/user/penginapan/pesan/{slug}', [CustomerController::class, 'penginapanPesan'])->name('user.penginapan.pesan')->middleware('auth');

//transportasi
Route::get('/user/transportasi', [CustomerController::class, 'transportasi'])->name('user.transportasi')->middleware('auth');
Route::get('/user/transportasi/detail/{slug}', [CustomerController::class, 'transportasiDetail'])->name('user.transportasi.detail')->middleware('auth');
Route::post('/user/transportasi/pesan/{slug}', [CustomerController::class, 'transportasiPesan'])->name('user.transportasi.pesan')->middleware('auth');

//umkm
Route::get('/user/umkm', [CustomerController::class, 'umkm'])->name('user.umkm')->middleware('auth');
Route::get('/user/umkm/detail/{slug}', [CustomerController::class, 'umkmDetail'])->name('user.umkm.detail')->middleware('auth');
Route::post('/user/umkm/pesan/{slug}', [CustomerController::class, 'umkmPesan'])->name('user.umkm.pesan')->middleware('auth');

// riwayat
Route::get('/user/riwayat', [CustomerController::class, 'riwayat'])->name('user.riwayat')->middleware('auth');

//profile
Route::get('/user/profile', [CustomerController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::get('/user/profile/edit', [CustomerController::class, 'profileForm'])->name('user.profile.edit')->middleware('auth');
Route::post('/user/profile/edit', [CustomerController::class, 'profileUpdate'])->name('user.profile.update')->middleware('auth');

//pesanan
Route::get('/user/pesanan', [CustomerController::class, 'pesanan'])->name('user.pesanan')->middleware('auth');