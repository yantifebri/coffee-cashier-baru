<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $meja = Meja::latest()->get();
            return view('meja.index', compact('meja'));
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
    public function store(StoreMejaRequest $request)
    {

        $validated = $request->validated();
        DB::beginTransaction();
       Meja::create($request->all());
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    
    public function update(UpdateMejaRequest $request, $meja)
    {
        try {
            DB::beginTransaction();
            $meja = Meja::findOrFail($meja);
            $validate = $request->validated();
            $meja->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }
    public function destroy(Meja $meja)
    {
        try {
            $meja->delete();
            return redirect('/meja')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}