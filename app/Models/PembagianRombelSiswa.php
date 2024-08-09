<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembagianRombelSiswa extends Model
{
    use HasFactory;
    protected $table = 'pembagian_rombongan_belajar';
    protected $guarded = ['id'];
}
