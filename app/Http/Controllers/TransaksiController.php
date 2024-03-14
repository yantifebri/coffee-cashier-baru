<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Menghitung nomor transaksi baru
            $last_id = Transaksi::whereDate('tanggal', today())->orderBy('id', 'desc')->first();
            $last_id_number = $last_id ? substr($last_id->id, 8) : 0;
            $notrans = today()->format('Ymd') . str_pad($last_id_number + 1, 4, '0', STR_PAD_LEFT);

            // Membuat transaksi baru
            $transaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => today(),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash', // Metode pembayaran default, bisa disesuaikan
                'keterangan' => '' // Keterangan default, bisa disesuaikan
            ]);

            // Membuat detail transaksi
            foreach ($request->orderedList as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }

            DB::commit();

            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'notrans' => $notrans]);
        } catch (QueryException $e) {
            DB::rollBack();
            dd($e);
            // return response()->json(['status' => false, 'message' => 'Pemesanan Gagal!']);
        }
    }



    public function faktur($nofaktur)
    {

        try {
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query) {
                $query->with('menu');
            }])->first();
            return view('cetak.faktur')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            // return response()->json(['status' =>false,'message'=>'Pemesanan Gagal']);
            dd($data);
        }
    }
    // $data = Transaksi::where('id', $nofaktur)->with(['DetailTransaksi'])->first();
    // // return view('cetak.faktur');
    // // foreach($data->DetailTransaksi as $dt){
    // //     echo $dt->menu->nama_menu."<br>";
    // // }
    // dd($data);
    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
