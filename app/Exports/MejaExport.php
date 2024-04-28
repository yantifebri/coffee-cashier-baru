<?php

namespace App\Exports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MejaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Meja::all();

        // Ubah koleksi data menjadi koleksi baru dengan menambahkan nomor urut
        return $data->map(function ($meja, $index) {
            return [
                'No' => $index + 1,
                'Nomor meja' => $meja->nomor_meja,
                'Kapasitas' => $meja->kapasitas,
                'Status' => $meja->status,
            ];
        });
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set ukuran lebar kolom
                $event->sheet->getColumnDimension('A')->setWidth(5); // No
                $event->sheet->getColumnDimension('B')->setAutoSize(true); // Nama Jenis
                $event->sheet->getColumnDimension('c')->setAutoSize(true); // kappasitas
                $event->sheet->getColumnDimension('c')->setAutoSize(true); // status

                // Judul di atas data
                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->setCellValue('A1', "DATA MEJA");

                // Style judul
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Style border untuk seluruh data
                $event->sheet->getStyle('A3:D' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
            }
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nomor meja',
            'Kapasitas',
            'Status',
        ];
    }

    /**
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk baris judul
            1 => ['font' => ['bold' => true]],
            // Style untuk judul "DATA JENIS"
            'A1:D1' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'f12bff'],
                ],
            ],
        ];
    }
}
