<?php

namespace App\Exports;

use App\Model\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPelanggan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelanggan::all();
    }
    public function map($pelanggan): array{
        return[
            $pelanggan->name,
            $pelanggan->telepon,
            $pelanggan->email,
            $pelanggan->alamat,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Telepon',
            'Email',
            'Komentar',
        ];
    }
}
