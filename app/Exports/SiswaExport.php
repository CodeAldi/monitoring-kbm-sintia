<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromArray
{
    function array(): array
    {
        return [
            ['#', 'nis', 'nama', 'jenis_kelamin'],
        ];        
    }
}
