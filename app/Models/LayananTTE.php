<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananTTE extends Model
{
    use HasFactory;
    protected $table = 'layanan_tte';


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function perangkatDaerah()
    {
        return $this->belongsTo(PerangkatDaerah::class, 'perangkat_daerah_id');
    }

    public function statusPermohonan()
    {
        return $this->belongsTo(StatusPermohonan::class, 'status_permohonan_id');
    }
}
