<?php

use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('kategori_produk', KategoriProdukController::class);
Route::resource('barang_masuk', BarangMasukController::class);
Route::resource('produk', ProdukController::class);