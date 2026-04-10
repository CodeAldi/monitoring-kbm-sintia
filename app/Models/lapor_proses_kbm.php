<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lapor_proses_kbm extends Model
{
    use HasFactory;
    protected $table = 'lapor_proses_kbm';
    protected $guarded = ['id'];
    /**
     * Get the jadwal_mengajar that owns the lapor_proses_kbm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jadwal_mengajar(): BelongsTo
    {
        return $this->belongsTo(JadwalMengajar::class,'jadwal_mengajar_id');
    }
}
