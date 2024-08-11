<?php

namespace App\Models;

use App\Enums\StatusAbsen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiHarianGuru extends Model
{
    use HasFactory;
    protected $table = 'absensi_harian_guru';
    protected $guarded = ['id'];
    protected $cast = [
        'status' => StatusAbsen::class,
        
    ];
}
