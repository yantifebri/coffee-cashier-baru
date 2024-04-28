<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $jumlahMenu = Menu::count();
        // return view('templates.dashboard', ['jumlahMenu' => $jumlahMenu]);

        $menu = Menu::get();
        $data['count_menu'] = $menu->count();

        $data['pelanggan'] = Pelanggan::limit(10)->orderby('created_at', 'desc')->get();

        $transaksi = Transaksi::get();
        $data['pendapatan'] = $transaksi->sum('total_harga');

        return view('templates/dashboard')->with($data);
    }
}
