<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return new Collection([
            []
        ]);
    }
    public function headings(): array
    {
        return [
            'name',
            'nomor_induk',
            'email',
            'password'
        ];
    }
}
