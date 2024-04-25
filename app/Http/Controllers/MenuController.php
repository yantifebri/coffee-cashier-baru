<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Imports\MenuImport;
use App\Models\jenis;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('jenis')->get();
        $jenis = jenis::all();

        return view('menu.index', compact('jenis', 'menu'));
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
    public function store(StoreMenuRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();

        //mendapatkan file yg diunggal peggguna
        $file = $request->file('image');
        //menyimpan file ke direktori penyimpanan
        $file_name = $file->getClientOriginalName(); //nama file asli
        $file_path = $file->storeAs('ya', $file_name); //nama file asli
        //simmpan nama file ke dalam kolom image di database
        $menu = Menu::create($request->all());

        $menu->image = $file_path;
        $menu->save();

        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $file_name = $file->getClientOriginalName(); //nama file asli
                $file_path = $file->storeAs('ya', $file_name); //nama file asli

                $menu->image = $file_path;
                $menu->save();
                return redirect('menu')->with('success', 'Update data berhasil!');
            } else {
                return redirect('menu')->with('error', 'Gagal mengupdate data gambar!');
            }
        } else {
            return redirect('menu')->with('error', 'Tidak ada gambar yang diunggah');
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('/menu')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . 'menu.xlsx');
    }
    public function generatepdf()
    {
        $data = Menu::all();
        $pdf = Pdf::loadView('menu.exportPdf', compact('data'));
        return $pdf->download('menu.pdf');
    }

    public function importDataMenu(Request $request)
    {

        $validator = FacadesValidator::make($request->all(), [
            'import' => 'required'
        ]);
        $validated = $validator->validated();
        Excel::import(new MenuImport, $validated['import']);
        return redirect()->back()->with('success', 'Data berhasil di import');
    }
}
