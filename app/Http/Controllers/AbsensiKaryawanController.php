<?php

namespace App\Http\Controllers;

use App\Models\AbsensiKaryawan;
use App\Http\Requests\StoreAbsensiKaryawanRequest;
use App\Http\Requests\UpdateAbsensiKaryawanRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

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
        $validated = $request->validated();
        DB::beginTransaction();
        AbsensiKaryawan::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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
    public function update(UpdateAbsensiKaryawanRequest $request, AbsensiKaryawan $absensiKaryawan)
    {
        //
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
}
