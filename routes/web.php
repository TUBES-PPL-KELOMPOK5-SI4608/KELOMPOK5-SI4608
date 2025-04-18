<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard-admin', function () {
    return view('dashboard.admin');  // Sesuaikan dengan view yang kamu punya
})->name('dashboard-admin');

Route::resource('barangs', BarangController::class);
Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');

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
    return view('welcome');
});