<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSPLPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('layanan_splp')->insert([
            [
                'nama_pemohon' => 'Pemohon 1',
                'nip_nik' => '1234567890',
                'nama_api' => 'API 1',
                'nama_aplikasi_website' => 'Aplikasi 1',
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
                'nama_api' => 'API 2',
                'nama_aplikasi_website' => 'Aplikasi 2',
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
                'nama_api' => 'API 3',
                'nama_aplikasi_website' => 'Aplikasi 3',
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
                'nama_api' => 'API 4',
                'nama_aplikasi_website' => 'Aplikasi 4',
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
                'nama_api' => 'API 5',
                'nama_aplikasi_website' => 'Aplikasi 5',
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
