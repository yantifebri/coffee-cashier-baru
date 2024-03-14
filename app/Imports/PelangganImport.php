<?php

namespace App\Imports;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {

            Pelanggan::create([
                'nama' => $row['nama'],
                'email' => $row['email'],
                'nomor_telepon' => $row['nomor_telepon'],
                'alamat' => $row['alamat']
            ]);
        }
    }
}
