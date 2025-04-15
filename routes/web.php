<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController; // <-- Tambahkan ini

Route::get('/', function () {
    return view('welcome');
});

// Route untuk lihat stok barang
Route::get('/barang', [BarangController::class, 'index']);


//Route untuk tambah barang
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');

// Route untuk proses simpan barang
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');