<?php

namespace App\Imports;

use App\Models\Jenis;
use App\Models\Stok;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {
            $jumlah = $row['jumlah'];

            Stok::create([
                'jumlah' => $jumlah
            ]);
        }
    }
}
