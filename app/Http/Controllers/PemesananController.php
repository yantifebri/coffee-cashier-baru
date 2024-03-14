<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\jenis;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // try {
        //     $pemesanan = Pemesanan::latest()->get();
        //     return view('pemesanan.index', compact('pemesanan'));
        // } catch (QueryException | Exception | PDOException $error) {
        //     //    $this->failResponse($error->getMessage(), $error->getCode());
        //     // return redirect()->back()->withErrors(['message' => 'Terjadi error']);
        // }
        $data['jenis'] = jenis::with(['menu'])->get();
        // dd($data['jenis']);
        return view('pemesanan.index')->with($data);
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
    public function store(StorePemesananRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        Pemesanan::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    public function update(UpdatePemesananRequest $request, $pemesanan)
    {
        try {
            DB::beginTransaction();
            $pemesanan = Pemesanan::findOrFail($pemesanan);
            $validate = $request->validated();
            $pemesanan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->delete();
            return redirect('/pemesanan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
