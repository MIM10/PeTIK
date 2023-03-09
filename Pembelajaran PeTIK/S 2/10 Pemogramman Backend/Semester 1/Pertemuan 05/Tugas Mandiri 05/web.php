<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', function () {
    return view('welcome');
});

// Url Salam
Route::get('/salam',function(){
    return "Assalamu'alaikum Selamat Pagi Dunia";
});

// Route dengan Parameter
Route::get('/pegawai/{nama}/{divisi}',function($nama,$divisi){
    return "Nama Pegawai : ".$nama."<br>Departemen : ".$divisi;
});

// Route dengan Redirect Page Views
Route::get('/kabar',function(){
    return view("latihan.kondisi");
});

// Route /mahasantri
Route::get('/mahasantri', [MahasantriController::class, 'dataMahasantri']
);

// Route Hello (pertemuan 4)
Route::get('/hello', function () {
    return view('hello', ['name' => 'Inaya']);
});

// Route Nilai
Route::get('/nilai', function () {
    return view('nilai');
});

// Route Daftar Nilai
Route::get('/daftarnilai', function () {
    return view('latihan.daftar_nilai');
});

// Routes
Route::get('/phpframework', function () {
    return view('layouts.index');
});

// Routes
Route::get('/tugas', function () {
    return view('tugas.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'aboutus']);

// menampilkan data pegawai
Route::resource('pegawai', PegawaiController::class);