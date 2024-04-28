<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class diagramController extends Controller
{
    public function index(Request $request)
    {
        $jumlahMenu = Menu::count();
        return view('templates.dashboard', ['jumlahMenu' => $jumlahMenu]);

       
    }
}
//jumlah data menu
//pelanggan
//transaksi
//transaksi pertanggal
//10 transaksi terakhir
//pendapatan semua
//pendapatan per tanggal
//menu paling laku
//stok yang sudah mau habis
//grafik