<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProfileController;

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

Auth::routes();

Route::get('/test-admin', function () {
    return view('layouts.admin');
});

Route::get('/hallo', function () {
    return view('halo');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('kategori_produk', KategoriProdukController::class);
Route::resource('barang_masuk', KategoriProdukController::class);
Route::resource('produk', KategoriProdukController::class);
Route::resource('profile', ProfileController::class);

require __DIR__.'/auth.php';