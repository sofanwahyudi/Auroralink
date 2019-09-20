<?php

namespace App\Exports;

use App\Model\Leads;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportLeads implements FromCollection,  WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Leads::all();
    }
    public function map($leads): array{
        return[
            $leads->nama,
            $leads->telepon,
            $leads->email,
            $leads->komentar,
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
