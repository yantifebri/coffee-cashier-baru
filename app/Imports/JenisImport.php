<?php

namespace App\Imports;

use App\Models\Jenis;

use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jenisImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {
            $nama_jenis = $row['nama_jenis'];

            Jenis::create([
                'nama_jenis' => $nama_jenis
            ]);
        }
    }
}
