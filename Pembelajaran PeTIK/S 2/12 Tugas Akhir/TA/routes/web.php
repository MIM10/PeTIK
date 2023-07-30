<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CarouselController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::get('/kategori1', [UserController::class, 'kategori1']) ->name('user.kategori1');
Route::get('/kategori2', [UserController::class, 'kategori2']) ->name('user.kategori2');
Route::get('/kategori3', [UserController::class, 'kategori3']) ->name('user.kategori3');

Auth::routes();




Route::middleware(['auth'])->group(function () {
    Route::resources([
        'produk' => ProdukController::class,
        'populer' => CarouselController::class,
    ]);
    Route::get('/Kategori1', [ProdukController::class, 'kategori1']) ->name('user.Kategori1');
    Route::get('/Kategori2', [ProdukController::class, 'kategori2']) ->name('user.Kategori2');
    Route::get('/Kategori3', [ProdukController::class, 'kategori3']) ->name('user.Kategori3');
});
