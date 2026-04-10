<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class JurusanExport implements FromArray
{
    function array(): array
    {
        return [
            ['nama_jurusan','kode_jurusan'],
        ];
    }
}
