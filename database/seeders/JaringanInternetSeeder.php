<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JaringanInternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('jaringan_internet')->insert([
            [
                'nama_pemohon' => 'Pemohon 1',
                'nip_nik' => '1234567890',
                'lokasi' => 'Lokasi 1',
                'unit_kerja' => 'Unit 1',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 1,
                'perangkat_daerah_id' => 1,
                'status_permohonan_id' => 1,
            ],
            [
                'nama_pemohon' => 'Pemohon 2',
                'nip_nik' => '1234567891',
                'lokasi' => 'Lokasi 2',
                'unit_kerja' => 'Unit 2',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 2,
                'perangkat_daerah_id' => 2,
                'status_permohonan_id' => 2,
            ],
            [
                'nama_pemohon' => 'Pemohon 3',
                'nip_nik' => '1234567892',
                'lokasi' => 'Lokasi 3',
                'unit_kerja' => 'Unit 3',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 3,
                'perangkat_daerah_id' => 3,
                'status_permohonan_id' => 3,
            ],
            [
                'nama_pemohon' => 'Pemohon 4',
                'nip_nik' => '1234567893',
                'lokasi' => 'Lokasi 4',
                'unit_kerja' => 'Unit 4',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 4,
                'perangkat_daerah_id' => 4,
                'status_permohonan_id' => 4,
            ],
            [
                'nama_pemohon' => 'Pemohon 5',
                'nip_nik' => '1234567894',
                'lokasi' => 'Lokasi 5',
                'unit_kerja' => 'Unit 5',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 5,
                'perangkat_daerah_id' => 5,
                'status_permohonan_id' => 5,
            ],
        ]);
    }
}
