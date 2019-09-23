<?php

namespace App\Exports;

use App\Model\Part;
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
        return Part::all();
    }
    public function map($kat): array{
        return[
            $kat->sku,
            $kat->nama,
            $kat->harga_jual,
            $kat->harga_beli,
            $kat->supplier['nama'],
            $kat->kategori['nama'],
        ];
    }

    public function headings(): array
    {
        return [
            'Sku',
            'Nama',
            'Harga Jual',
            'Harga Beli',
            'Supplier',
            'Kategori',
        ];
    }
}
