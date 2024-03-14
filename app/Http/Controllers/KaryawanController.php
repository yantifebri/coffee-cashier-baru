<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $karyawan = Karyawan::latest()->get();
            return view('karyawan.index', compact('karyawan'));
        } catch (QueryException | Exception | PDOException $error) {
            //    $this->failResponse($error->getMessage(), $error->getCode());
            // return redirect()->back()->withErrors(['message' => 'Terjadi error']);
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
    public function store(StoreKaryawanRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        // dd($request->file('foto'));
        $foto = $request->file('foto');
        // Storage::put('foto/'.$request->file('foto'));
        $foto->storeAs('gg', $foto->getClientOriginalName());
        Karyawan::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    public function update(UpdateKaryawanRequest $request, $karyawan)
    {
        try {
            DB::beginTransaction();
            $karyawan = karyawan::findOrFail($karyawan);
            $validate = $request->validated();
            $karyawan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Karyawan $karyawan)
    {
        try {
            $karyawan->delete();
            return redirect('/karyawan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
