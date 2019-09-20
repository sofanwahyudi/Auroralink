<?php

namespace App\Exports;

use App\Model\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportPart implements FromCollection,   WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kategori::all();
    }
    public function map($kat): array{
        return[
            $kat->nama,
            $kat->telepon,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Deskripsi',
        ];
    }
}
