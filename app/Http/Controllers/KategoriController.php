<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;

use App\Exports\KategoriExport;
use App\Models\kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use App\Imports\KategoriImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekategoriRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        kategori::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriRequest $request, $kategori)
    {
        try {
            DB::beginTransaction();
            $kategori = kategori::findOrFail($kategori);
            $validate = $request->validated();
            $kategori->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(kategori $kategori)
    {
        try {
            $kategori->delete();
            return redirect('/kategori')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }


    public function exportData()
    {
        $date = date('Y-m-d');
        return excel::download(new KategoriExport, $date . 'kategori.xlsx');
    }
    public function generatepdf()
    {
        $data = kategori::all();
        $pdf = Pdf::loadView('kategori.exportPdf', compact('data'));
        return $pdf->download('kategori.pdf');
    }
    // public function importData(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'import' => 'required'
    //     ]);
    //     $validated = $validator->validated();
    //     Excel::import(new KategoriImport, $validated['import']);
    //     return redirect()->back()->with('success', 'Data berhasil di import');
    // }

    public function importData(Request $request)
    {

        // $validator = FacadesValidator::make($request->all(), [
        //     'import' => 'required'
        // ]);
        // $validated = $validator->validated();
        // Excel::import(new KategoriImport, $validated['import']);
        Excel::import(new KategoriImport, $request->import);
        return redirect()->back()->with('success', 'Data berhasil di import');
    }
}
