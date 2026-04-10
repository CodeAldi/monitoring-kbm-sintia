<?php

namespace App\Imports;

use App\Models\Jurusan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class JurusanImport implements ToCollection, WithHeadingRow
{
    function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $siswa[$key] = Jurusan::updateOrCreate(
                [
                    'nama_jurusan' => $value['nama_jurusan'],
                    'kode_jurusan' => $value['kode_jurusan'],
                ]
            );
        }
    }
}
