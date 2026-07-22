<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PublikController::class, 'home'])->name('home');
Route::get('/tentang-kami', [\App\Http\Controllers\PublikController::class, 'about'])->name('about');
Route::get('/daftar-fasilitas', [\App\Http\Controllers\PublikController::class, 'facilities'])->name('fasilitas');
Route::get('/daftar-galeri', [\App\Http\Controllers\PublikController::class, 'gallery'])->name('gallery');
Route::get('/daftar-kamar', [\App\Http\Controllers\PublikController::class, 'rooms'])->name('kamar.public');
Route::get('/daftar-kamar/{room}', [\App\Http\Controllers\PublikController::class, 'roomDetail'])->name('kamar.detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('profil-wisma', \App\Http\Controllers\ProfilWismaController::class);
    Route::resource('fasilitas', \App\Http\Controllers\FasilitasController::class);
    Route::resource('galeri', \App\Http\Controllers\GaleriController::class);
    Route::resource('kamar', \App\Http\Controllers\KamarController::class);
    Route::resource('pemesanan', \App\Http\Controllers\PemesananController::class);
});

require __DIR__.'/auth.php';
