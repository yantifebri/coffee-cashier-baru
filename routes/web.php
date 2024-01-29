<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StokController;


Route::get('/', [HomeController::class, 'index']);
Route::resource('/karyawan', KaryawanController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/jenis', JenisController::class);
Route::resource('/menu', MenuController::class);
Route::resource('/stok', StokController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/meja', MejaController::class);
