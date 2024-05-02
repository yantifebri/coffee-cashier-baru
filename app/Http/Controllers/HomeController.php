<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Hitung jumlah menu
        $data['count_menu'] = Menu::count();

        // Dapatkan data pelanggan terbaru
        $data['pelanggan'] = Pelanggan::limit(10)->orderBy('created_at', 'desc')->get();

        // Hitung jumlah pendapatan total dari transaksi
        $data['pendapatan'] = Transaksi::whereBetween('created_at', [
            Carbon::yesterday()->startOfDay(),
            Carbon::yesterday()->endOfDay()
        ])->sum('total_harga');

        // Hitung top 5 menu penjualan
        $menuSales = DetailTransaksi::select('menu_id', \DB::raw('SUM(jumlah) as total_sales'))
            ->with('menu')
            ->groupBy('menu_id')
            ->orderBy('total_sales', 'desc')
            ->take(5)
            ->get();

        // Tambahkan data top 5 penjualan menu ke array data
        $data['menuSales'] = $menuSales;


        // Ambil 3 menu dengan stok terendah menggunakan join
        $menuTerendah = Menu::join('stok', 'menu.id', '=', 'stok.menu_id')
            ->orderBy('stok.jumlah', 'asc')
            ->select('menu.*', 'stok.jumlah')
            ->take(3)
            ->get();

        // Tambahkan data stok terendah ke array data
        $data['menuTerendah'] = $menuTerendah;

        // Ambil data pendapatan berdasarkan tanggal transaksi
        $pendapatan = Transaksi::selectRaw('DATE(tanggal) as tanggal, SUM(total_harga) as pendapatan')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        // Siapkan data untuk grafik
        $tanggal = $pendapatan->pluck('tanggal');
        $dataPendapatan = $pendapatan->pluck('pendapatan');

        // Tambahkan data pendapatan ke array data
        $data['tanggal'] = $tanggal;
        $data['dataPendapatan'] = $dataPendapatan;




        // dd($data);
        // Kirim data ke view
        return view('templates.dashboard', ['data' => $data]);
    }
}
