<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection, WithHeadingRow
{
    function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            // $siswa[$key] = new Siswa();
            // $siswa[$key]->nis = $value['nis'];
            // $siswa[$key]->nama = $value['nama'];
            // $siswa[$key]->jenis_kelamin = $value['jenis_kelamin'];
            // $siswa[$key]->upsert();

            $siswa[$key] = Siswa::updateOrCreate([
                'nis' => $value['nis'],
            ],[
                'nis' => $value['nis'],
                'nama' => $value['nama'],
                'jenis_kelamin' => $value['jenis_kelamin'],
            ]);
        }
        
    }
}
