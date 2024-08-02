<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPermohonan extends Model
{
    protected $table = 'status_permohonan';
    
    use HasFactory;
    public function layananZoom()
    {
        return $this->hasMany(LayananZoom::class, 'status_permohonan_id');
    }
}
