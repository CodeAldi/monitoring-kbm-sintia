<?php

namespace App\Exports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MapelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mapel::select('nama_mapel','kode_mapel')->get();
    }
    public function headings(): array {
        return [
            'nama_mapel',
            'kode_mapel',
        ];
    }

}
