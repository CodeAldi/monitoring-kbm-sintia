<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rpp_items extends Model
{
    use HasFactory;
    protected $table = 'rpp_items';
    protected $guarded = ['id'];
}
