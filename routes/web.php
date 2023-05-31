<?php

use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Map\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StockObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TitikController;

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

Route::group(['prefix' => 'data-master', 'as' => 'data-master.','middleware' => ['role:owner']], function() {
    // kalalog obat
    Route::get('obat.index', [ObatController::class, 'index'])->name('obat.index');
    Route::post('obat.store', [ObatController::class, 'store'])->name('obat.store');
    Route::post('obat.edits', [ObatController::class, 'edits'])->name('obat.edits');
    Route::post('obat.updates', [ObatController::class, 'updates'])->name('obat.updates');
    Route::post('obat.destroy', [ObatController::class, 'destroy'])->name('obat.destroy');

    // stock obat
    Route::get('stock-obat.index', [StockObatController::class, 'index'])->name('stock-obat.index');
    Route::post('stock-obat.store', [StockObatController::class, 'store'])->name('stock-obat.store');
    Route::post('stock-obat.edits', [StockObatController::class, 'edits'])->name('stock-obat.edits');
    Route::post('stock-obat.updates', [StockObatController::class, 'updates'])->name('stock-obat.updates');
    Route::post('stock-obat.destroy', [StockObatController::class, 'destroy'])->name('stock-obat.destroy');
    Route::post('getObat', [StockObatController::class, 'getObat'])->name('getObat');
});
Route::group(['prefix' => 'menu', 'as' => 'menu.','middleware' => ['role:owner']], function() {
    // kalalog obat
    Route::get('map.index', [TitikController::class, 'index'])->name('map.index');
    Route::get('map/titik/json', [TitikController::class, 'titik'])->name('map.titik');
});
Route::group(['prefix' => 'setting', 'as' => 'setting.','middleware' => ['role:owner']], function() {
    // kalalog obat
    Route::get('user-management', [AdminPanelController::class, 'index'])->name('usermanagement');
    Route::post('user-management/store', [AdminPanelController::class, 'store'])->name('usermanagement.store');
});
Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.','middleware' => ['role:owner']], function() {
    // Transaksi
    Route::get('supplier.index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('supplier.store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::post('supplier.edits', [SupplierController::class, 'edits'])->name('supplier.edits');
    Route::post('supplier.updates', [SupplierController::class, 'updates'])->name('supplier.updates');
    Route::post('supplier.destroy', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    // Transaksi
    Route::get('penjualan.index', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::post('penjualan.store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::post('penjualan.edits', [PenjualanController::class, 'edits'])->name('penjualan.edits');
    Route::post('penjualan.updates', [PenjualanController::class, 'updates'])->name('penjualan.updates');
    Route::post('penjualan.destroy', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [WelcomeController::class, 'index'])->name('/');
require __DIR__ . '/auth.php';