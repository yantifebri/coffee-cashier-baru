<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiKaryawanExport;
use App\Models\AbsensiKaryawan;
use App\Http\Requests\StoreAbsensiKaryawanRequest;
use App\Http\Requests\UpdateAbsensiKaryawanRequest;
use App\Imports\AbsensiKaryawanImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class AbsensiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        try {
            $absensiKaryawan = AbsensiKaryawan::latest()->get();
            return view('absensi.index', compact('absensiKaryawan'));
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
    public function store(StoreAbsensiKaryawanRequest $request)
    {
        AbsensiKaryawan::create($request->all());

        return redirect('absensi')->with('success', 'Data Absensi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiKaryawan $absensiKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiKaryawan $absensiKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiKaryawanRequest $request, $absensiKaryawan)
    {
        try {
            DB::beginTransaction();
            $absensiKaryawan = AbsensiKaryawan::findOrFail($absensiKaryawan);
            // $validate = $request->validated();
            $absensiKaryawan->update($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    public function updateStatus(Request $request)
    {
        $row_num = $request->input('row_num');
        $new_status = $request->input('new_status');

        // Temukan data absensi dengan nomor baris yang sesuai
        $absen = AbsensiKaryawan::find($row_num);

        // Jika data absensi tidak ditemukan, kembalikan respons dengan pesan error
        if (!$absen) {
            return response()->json(['error' => 'Data absensi tidak ditemukan', 'id' => $row_num], 404);
        }

        // Perbarui status absensi
        $absen->status = $new_status;
        $absen->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiKaryawan $absensi)
    {
        try {
            $absensi->delete();
            return redirect('/absensi')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }


    public function exportDataAbsen()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiKaryawanExport, $date . 'absen.xlsx');
    }
    public function pdfexport()
    {
        $data = AbsensiKaryawan::all();
        $pdf = Pdf::loadView('absensi.exportPdf', compact('data'));
        return $pdf->download('absensi.pdf');
    }


    public function importDataAbsen(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'import' => 'required'
        ]);
        $validated = $validator->validated();
        Excel::import(new AbsensiKaryawanImport, $validated['import']);
        return redirect()->back()->with('success', 'Data berhasil di import');
    }
}
