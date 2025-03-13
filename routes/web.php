<?php

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
