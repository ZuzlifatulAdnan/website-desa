<?php

use App\Http\Controllers\AparaturController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'beranda');

Route::resource('beranda', BerandaController::class);
Route::resource('profile', AparaturController::class);
Route::resource('layanan', LayananController::class);
Route::resource('wisata', WisataController::class);
Route::resource('budaya', BudayaController::class);
Route::resource('berita', ArtikelController::class);
Route::resource('kontak', KontakController::class);
