<?php

namespace App\Imports;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            // dd($value);
            $siswa[$key] = User::updateOrCreate(
                [
                    'nomor_induk' => $value['nomor_induk'],
                ],[
                    'name' => $value['name'],
                    'nomor_induk' => $value['nomor_induk'],
                    'email' => $value['email'],
                    'password' => bcrypt($value['password']),
                    
                ]
            );
            $siswa[$key]->role = UserRole::GuruMapel;
            $siswa[$key]->save();
        }
    }
}
