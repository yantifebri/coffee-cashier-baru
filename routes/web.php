<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('/karyawan', KaryawanController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/jenis', JenisController::class);
