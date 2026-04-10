<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruMapel extends Model
{
    use HasFactory;
    protected $table ='guru_mapel';
    protected $guarded = ['id'];

    /**
     * Get the user that owns the GuruMapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }

    /**
     * Get the Mapel that owns the GuruMapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class,'mapel_id','id');
    }
    /**
     * Get the Kelas that owns the GuruMapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
}
