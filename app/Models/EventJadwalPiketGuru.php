<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventJadwalPiketGuru extends Model
{
    use HasFactory;
    protected $table = 'event_jadwal_piket_guru';
    protected $guarded = ['id'];
}
