<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPiketGuru extends Model
{
    use HasFactory;
    protected $table = 'jadwal_piket_guru';
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function event_jadwal_mengajar(): BelongsTo
    {
        return $this->belongsTo(EventJadwalMengajar::class);
    }
}
