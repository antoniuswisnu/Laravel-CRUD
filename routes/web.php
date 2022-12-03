<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KomentarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Buku
Route::get('/buku', [bukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [bukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [bukuController::class, 'store'])->name('buku.store');

Route::get('/buku/edit/{id}', [bukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/edit/{id}',[bukuController::class, 'update'])->name('buku.update');

Route::get('/buku/delete/{id}', [bukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/detail-buku/{bukuSeo}', [bukuController::class, 'galBuku'])->name('buku.detail');
Route::get('/buku/search', [bukuController::class, 'search'])->name('buku.search');

// like
Route::get('/buku/like/{id}' , [bukuController::class, 'likefoto'])->name('buku.suka');

// Tambah Komentar
Route::post('/komentar/{id}' , [KomentarController::class, 'store'])->name('komentar.store');



// Akun
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/edit/{id}',[UserController::class, 'update'])->name('user.update');

Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/viewGaleri', [GaleriController::class, 'viewGaleri'])->name('viewGaleri.index');
Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');

Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
Route::post('/galeri/update/{id}',[GaleriController::class, 'update'])->name('galeri.update');

Route::post('/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
Route::get('/galeri/search', [GaleriController::class, 'search'])->name('user.search');

// Seo

Route::get('/detail-buku/{title}', [GaleriController::class, 'search'])->name('galeri.buku');

