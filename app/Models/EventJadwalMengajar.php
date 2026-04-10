<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventJadwalMengajar extends Model
{
    use HasFactory;
    protected $table = 'event_jadwal_mengajar';
    protected $guarded = ['id'];
}
