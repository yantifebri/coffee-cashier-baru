<?php

namespace App\Imports;

use App\Models\AbsensiKaryawan;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiKaryawanImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {

            AbsensiKaryawan::create([
                'namaKaryawan' => $row['nama'],
                'tanggalMasuk' => $row['tanggal_masuk'],
                'waktuMasuk' => $row['waktu_masuk'],
                'status' => $row['status'],
                'waktuKeluar' => $row['waktu_selesai'],
            ]);
        }
    }
}
