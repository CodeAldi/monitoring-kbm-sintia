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
    /**
     * Get the kelas that owns the JadwalMengajar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
    /**
     * Get the gurumapel that owns the JadwalMengajar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gurumapel(): BelongsTo
    {
        return $this->belongsTo(GuruMapel::class);
    }
    /**
     * Get the eventmengajar that owns the JadwalMengajar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventmengajar(): BelongsTo
    {
        return $this->belongsTo(EventJadwalMengajar::class, 'event_jadwal_mengajar_id');
    }
}
