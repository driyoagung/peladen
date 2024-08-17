<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananTTE extends Model
{
    protected $fillable = [
        'ktp',
        'nama_lengkap',
        'nik',
        'nip',
        'jabatan',
        'no_hp',
        'unit_kerja',
        'tanggal_permohonan',
        'waktu_permohonan',
        'kategori_id',
        'perangkat_daerah_id',
        'status_permohonan_id',
    ];
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