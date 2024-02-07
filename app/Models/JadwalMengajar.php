<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalMengajar extends Model
{
    use HasFactory;
    protected $table = 'jadwal_mengajar';
    protected $guarded = ['id'];
    
    /**
     * Get the event_jadwal_mengajar that owns the JadwalMengajar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event_jadwal_mengajar(): BelongsTo
    {
        return $this->belongsTo(EventJadwalMengajar::class);
    }
}
