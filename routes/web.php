<?php

use App\Http\Controllers\bukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [bukuController::class, 'index']);
Route::get('/buku/create', [bukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [bukuController::class, 'store'])->name('buku.store');

Route::get('/buku/edit/{id}', [bukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/edit/{id}',[bukuController::class, 'update'])->name('buku.update');

Route::post('/delete/{id}', [bukuController::class, 'destroy'])->name('buku.destroy');


Route::get('/buku/search', [bukuController::class, 'search'])->name('buku.search');