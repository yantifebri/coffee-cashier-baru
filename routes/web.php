<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;


Route::get('/', [HomeController::class, 'index']);
Route::resource('/karyawan', KaryawanController::class);
