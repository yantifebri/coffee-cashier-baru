<?php

namespace App\Exports;


use App\Models\produk_titipan;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProdukTitipanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return produk_titipan::all();
    }
}
