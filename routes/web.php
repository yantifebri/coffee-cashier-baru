<?php

use App\Http\Controllers\AbsensiKaryawanController;
use App\Http\Controllers\contactUsController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TentangApkController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;



//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('/register', RegisterController::class);



//route group
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/kategori', KategoriController::class);



    //admin
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/jenis', JenisController::class);
        Route::resource('/menu', MenuController::class);
        Route::resource('/stok', StokController::class);
        Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/meja', MejaController::class);
    });
    // kasir
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pemesanan', PemesananController::class);
        Route::get('nota/{faktur}', [TransaksiController::class, 'faktur']);
    });
});

Route::resource('/transaksi', TransaksiController::class);
Route::get('/laporan', [TentangApkController::class, 'index']);
Route::get('/tentang', [TentangApkController::class, 'index']);
Route::resource('/absensi', AbsensiKaryawanController::class);
Route::resource('/contactUs', contactUsController::class);



//kategori
Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-excell');
Route::get('generate/kategori', [KategoriController::class, 'generatepdf'])->name('export-pdf');
Route::post('kategori/import', [KategoriController::class, 'importData'])->name('bebek');
//jenis
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-excel-jenis');
Route::get('generate/jenis', [JenisController::class, 'generatepdfjenis'])->name('export-pdf-jenis');
Route::post('jenis/import', [JenisController::class, 'importData'])->name('bebek');
//menu
Route::get('export/menu', [MenuController::class, 'exportData'])->name('exportmenu');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('menu-pdf');
Route::post('menu/import', [MenuController::class, 'importDataMenu'])->name('import-menu');
//stok
Route::get('export/stok', [StokController::class, 'exportData'])->name('exportstok');
Route::get('generate/stok', [StokController::class, 'generatepdf'])->name('pdf-export');
Route::post('stok/import', [StokController::class, 'importData'])->name('bebek');
//pelanggan
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('pedeef');
Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('bebek');
//meja
Route::get('export/meja', [MejaController::class, 'exportData'])->name('ikan');
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('hiu');
Route::post('meja/import', [MejaController::class, 'importMeja'])->name('bebek');
//absen
Route::get('export/absen', [AbsensiKaryawanController::class, 'exportDataAbsen'])->name('export-excell-absen');
Route::get('generate/absen', [AbsensiKaryawanController::class, 'pdfexport'])->name('absen-pdf-export');
Route::post('absensi/import', [AbsensiKaryawanController::class, 'importDataAbsen'])->name('import-absen');
Route::post('update-status', [AbsensiKaryawanController::class, 'updateStatus']);



//produk titipan

Route::get('/', [HomeController::class, 'index']);
