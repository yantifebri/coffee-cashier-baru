<?php

namespace App\Http\Controllers;

use App\Models\produk_titipan;
use App\Http\Requests\Storeproduk_titipanRequest;
use App\Http\Requests\Updateproduk_titipanRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukTitipanExport;
use App\Imports\ProdukTitipanImport;
use Illuminate\Http\Request;
use PDOException;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $produk_titipan = produk_titipan::latest()->get();
            return view('produk_titipan.index', compact('produk_titipan'));
        } catch (QueryException | Exception | PDOException $error) {
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeproduk_titipanRequest $request)
    {
        $data = $request->all();
        $data['harga_jual'] = $this->hitungHargaJual($request->input('harga_beli'));

        produk_titipan::create($data);
        return redirect('produk_titipan')->with('success', 'Data Product berhasil di tambahkan!');
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateproduk_titipanRequest $request, $produk_titipan)
    {
        try {
            DB::beginTransaction();
            $produk_titipan = produk_titipan::findOrFail($produk_titipan);
            $validate = $request->validated();
            $produk_titipan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    private function hitungHargaJual($hargaBeli)
    {
        $keuntungan = $hargaBeli * 1.7;
        $hargaJual = ceil($keuntungan / 500) * 500;
        return $hargaJual;
    }


    public function destroy(produk_titipan $produk_titipan)
    {
        try {
            $produk_titipan->delete();
            return redirect('/produk_titipan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
    public function exportDataExcel()
    {
        $date = date('Y-m-d');
        return Excel::download(new ProdukTitipanExport, $date . 'produk_titipan.xlsx');
    }
    public function exportDataPdf()
    {
        $produk_titipan = produk_titipan::all();
        $pdf = Pdf::loadView('produk_titipan.data', compact('produk_titipan'));
        return $pdf->download('produk_titipan.pdf');
    }
    public function importExcel(Request $request)
    {

        Excel::import(new ProdukTitipanImport, $request->import);
        return redirect()->back()->with('success', 'Data berhasil di import');
    }
}
