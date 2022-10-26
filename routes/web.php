<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/tambah', [KategoriController::class, 'tambah'])->name('kategori.tambah');
Route::post('/kategori/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
Route::post('/produk/update', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

