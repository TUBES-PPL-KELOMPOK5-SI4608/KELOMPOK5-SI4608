<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\masukkeluarController;
use App\Http\Controllers\furnitureController;
use App\Http\Controllers\BarangMasukController;


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

Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard-manager', [DashboardController::class, 'indexManager'])->name('dashboard-manager');
Route::get('/dashboard-admin', [DashboardController::class, 'indexAdmin'])->name('dashboard-admin');
// Route::resource('barangs', BarangController::class);
// Route::get('/barangs', [BarangController::class, 'brangs.index'])->name('index');
Route::resource('furnitures', FurnitureController::class);
Route::resource('barang-masuk', BarangMasukController::class);
Route::get('/', function () {
    return view('welcome');
});