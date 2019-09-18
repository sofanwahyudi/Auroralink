<?php

namespace App\Exports;

use App\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportSupplier implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Supplier::all();
    }
    public function map($supplier): array{
        return[
            $supplier->nama,
            $supplier->alamat,
            $supplier->telepon,
            $supplier->email,
            $supplier->status,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alamat',
            'Telepon',
            'Email',
            'Status',
        ];
    }
}
