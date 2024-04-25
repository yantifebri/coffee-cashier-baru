<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Imports\StokImport;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Http\Request;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //     $stok = Stok::latest()->get();
        //     return view('stok.index', compact('stok'));
        // } catch (QueryException | Exception | PDOException $error) {

        // }
        $stok = Stok::all();
        try {
            $data['stok'] = Stok::with(['menu'])->get();
            $data['menu'] = Menu::get();
            return view('stok.index')->with($data);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
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
    public function store(StoreStokRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        Stok::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    public function update(UpdateStokRequest $request, $stok)
    {
        try {
            DB::beginTransaction();
            $stok = Stok::findOrFail($stok);
            $validate = $request->validated();
            $stok->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();
            return redirect('/stok')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new StokController, $date . 'stok.xlsx');
    }
    public function generatepdf()
    {
        $data = Stok::all();
        $pdf = Pdf::loadView('stok.exportPdf', compact('data'));
        return $pdf->download('stok.pdf');
    }
    public function importData(Request $request)
    {

        Excel::import(new StokImport, $request->import);
        return redirect()->back()->with('success', 'Data berhasil di import');
    }
}
