<?php

namespace App\Imports;

use App\Models\produk_titipan;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukTitipanImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {

            produk_titipan::create([
                'nama_produk' => $row['nama_produk'],
                'nama_supplier' => $row['nama_supplier'],
                'harga_beli' => $row['harga_beli'],
                'harga_jual' => $row['harga_jual'],
                'stok' => $row['stok'],
                'keterangan' => $row['keterangan']
            ]);
        }
    }
}
