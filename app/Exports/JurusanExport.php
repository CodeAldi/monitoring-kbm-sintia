<?php

namespace App\Exports;

use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class JurusanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Jurusan::select('nama_mapel', 'kode_mapel')->get();
    }
    public function headings(): array
    {
        return [
            'nama_mapel',
            'kode_mapel',
        ];
    }
}
