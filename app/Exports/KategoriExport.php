namespace App\Exports;

use App\Models\kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class KategoriExport implements FromCollection, WithStyles, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Kembalikan koleksi data untuk diekspor
        return kategori::all();
    }

    /**
     * Memetakan data dari koleksi
     *
     * @param  kategori  $data
     * @return array
     */
    public function map($data): array
    {
        return [
            $data->nama_kategori, // Mengakses properti nama_kategori
            // Tambahkan kolom lain jika diperlukan
        ];
    }

    /**
     * Menerapkan gaya ke sheet
     *
     * @param  Worksheet  $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Baris pertama (header)
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF0000FF'] // Warna biru
                ],
            ],
        ];
    }
}
