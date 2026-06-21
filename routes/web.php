<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/beranda');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');

Route::get('/profil', [ProfilController::class, 'index'])->name('profile.index');

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

// Permohonan layanan online (didefinisikan sebelum route slug agar tidak bentrok)
Route::get('/permohonan', [PermohonanController::class, 'create'])->name('permohonan.create');
Route::post('/permohonan', [PermohonanController::class, 'store'])->name('permohonan.store');
Route::get('/permohonan/lacak', [PermohonanController::class, 'lacak'])->name('permohonan.lacak');

Route::get('/layanan/{layanan:slug}', [LayananController::class, 'show'])->name('layanan.show');

Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{wisata:slug}', [WisataController::class, 'show'])->name('wisata.show');

Route::get('/budaya', [BudayaController::class, 'index'])->name('budaya.index');
Route::get('/budaya/{budaya:slug}', [BudayaController::class, 'show'])->name('budaya.show');

Route::get('/berita', [ArtikelController::class, 'index'])->name('berita.index');
Route::get('/berita/{artikel:slug}', [ArtikelController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/pengumuman/{pengumuman:slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
