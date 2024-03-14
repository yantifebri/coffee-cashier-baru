<?php

namespace App\Imports;

use App\Models\Kategori;
use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $row) {

            Menu::create([
                'nama_menu' => $row['nama_menu'],
                'harga' => $row['harga'],
                'image' => $row['image'],
                'deskripsi' => $row['deskripsi'],
                'jenis_id' => $row['jenis_id']
            ]);
        }
    }
}
