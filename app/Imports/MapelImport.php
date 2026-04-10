<?php

namespace App\Imports;

use App\Models\Mapel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MapelImport implements ToCollection, WithHeadingRow
{
    function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            // $siswa[$key] = new Siswa();
            // $siswa[$key]->nis = $value['nis'];
            // $siswa[$key]->nama = $value['nama'];
            // $siswa[$key]->jenis_kelamin = $value['jenis_kelamin'];
            // $siswa[$key]->upsert();

            $siswa[$key] = Mapel::updateOrCreate(
                [
                'nama_mapel' => $value['nama_mapel'],
                'kode_mapel' => $value['kode_mapel'],
                ]
            );
        }
    }
}
