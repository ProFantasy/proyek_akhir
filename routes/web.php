<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;

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

Route::middleware('auth')->group(function (){
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('input_barang', [BarangController::class, 'input']);
    Route::post('kirim_barang', [BarangController::class, 'kirim']);
    Route::get('tampil_barang', [BarangController::class, 'tampil']);
    Route::get('hapus_barang/{kode}', [BarangController::class, 'hapus']);
    Route::get('edit_barang/{kode}', [BarangController::class, 'edit']);
    Route::post('update_barang/{kode}', [BarangController::class, 'update']);

    Route::get('input_customer', [CustomerController::class, 'input']);
    Route::post('kirim_customer', [CustomerController::class, 'kirim']);
    Route::get('tampil_customer', [CustomerController::class, 'tampil']);
    Route::get('hapus_customer/{ktp}', [CustomerController::class, 'hapus']);
    Route::get('edit_customer/{ktp}', [CustomerController::class, 'edit']);
    Route::post('update_customer/{ktp}', [CustomerController::class, 'update']);

    Route::get('input_pembelian', [pembelianController::class, 'input']);
    Route::post('kirim_pembelian', [pembelianController::class, 'kirim']);
    Route::get('tampil_pembelian', [pembelianController::class, 'tampil']);
    Route::get('hapus_pembelian/{id}', [pembelianController::class, 'hapus']);
    Route::get('edit_pembelian/{id}', [pembelianController::class, 'edit']);
    Route::post('update_pembelian/{id}', [pembelianController::class, 'update']);

    Route::get('logout',[LoginController::class,'logout']);

    Route::get('setting',[AkunController::class,'index']);
    Route::post('update_password',[AkunController::class,'update']);
    Route::post('delete',[AkunController::class,'delete']);
});
Route::middleware('guest')->group(function (){
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
});