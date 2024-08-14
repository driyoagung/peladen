<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananVPN extends Model
{
    protected $table = 'layanan_vpn';
    use HasFactory;

    protected $fillable = [
        'nama_pemohon',
        'nip_nik',
        'lokasi',
        'unit_kerja',
        'tanggal_permohonan',
        'waktu_permohonan',
        'kategori_id',
        'perangkat_daerah_id',
        'status_permohonan_id',
    ];

    public function statusPermohonan()
    {
        return $this->belongsTo(StatusPermohonan::class, 'status_permohonan_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function perangkatDaerah()
    {
        return $this->belongsTo(PerangkatDaerah::class, 'perangkat_daerah_id');
    }
}
