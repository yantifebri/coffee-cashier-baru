<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $jenis = Jenis::latest()->get();
            return view('jenis.index', compact('jenis'));
        } catch (QueryException | Exception | PDOException $error) {
            //    $this->failResponse($error->getMessage(), $error->getCode());
            // return redirect()->back()->withErrors(['message' => 'Terjadi error']);
        }
    }
    /**
     * Show the form for creating a new resource.
     */

    public function store(StoreJenisRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
        Jenis::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, $jeni)
    {
        try {
            DB::beginTransaction();
            $jeni = Jenis::findOrFail($jeni);
            $validate = $request->validated();
            $jeni->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Jenis $jeni)
    {
        try {
            $jeni->delete();
            return redirect('/jenis')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
