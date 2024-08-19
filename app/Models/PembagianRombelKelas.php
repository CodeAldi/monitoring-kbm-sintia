<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembagianRombelKelas extends Model
{
    use HasFactory;
    protected $table = 'pembagian_rombel_kelas';
    protected $guarded = ['id'];

    /**
     * Get the kelas that owns the PembagianRombelKelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }
    /**
     * Get the rombel that owns the PembagianRombelKelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class, 'rombongan_belajar_id');
    }
}
