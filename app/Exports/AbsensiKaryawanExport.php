<?php

namespace App\Exports;

use App\Models\AbsensiKaryawan;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsensiKaryawanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AbsensiKaryawan::all();
    }
}
