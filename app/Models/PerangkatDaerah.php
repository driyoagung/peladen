<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerah extends Model
{
    protected $table = 'perangkat_daerah';

    use HasFactory;
    public function layananZoom()
    {
        return $this->hasMany(LayananZoom::class, 'perangkat_daerah_id');
    }
}
