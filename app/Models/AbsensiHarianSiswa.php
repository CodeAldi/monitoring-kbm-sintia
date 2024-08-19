<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiHarianSiswa extends Model
{
    use HasFactory;
    protected $table = 'absensi_harian_siswa';
    protected $guarded = ['id'];
}
