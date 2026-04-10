<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembagianRombelSiswa extends Model
{
    use HasFactory;
    protected $table = 'pembagian_rombongan_belajar';
    protected $guarded = ['id'];

    /**
     * Get the siswa that owns the PembagianRombelSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
