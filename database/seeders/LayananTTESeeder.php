<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananTTESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('layanan_tte')->insert([
            [
                'ktp' => '1234567890',
                'nama_lengkap' => 'Pemohon 1',
                'nik' => '9876543210',
                'nip' => '1234567890',
                'jabatan' => 'Jabatan 1',
                'no_hp' => '081234567890',
                'unit_kerja' => 'Unit 1',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 1,
                'perangkat_daerah_id' => 1,
                'status_permohonan_id' => 1,
            ],
            [
                'ktp' => '1234567891',
                'nama_lengkap' => 'Pemohon 2',
                'nik' => '9876543211',
                'nip' => '1234567891',
                'jabatan' => 'Jabatan 2',
                'no_hp' => '081234567891',
                'unit_kerja' => 'Unit 2',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 2,
                'perangkat_daerah_id' => 2,
                'status_permohonan_id' => 2,
            ],
            [
                'ktp' => '1234567892',
                'nama_lengkap' => 'Pemohon 3',
                'nik' => '9876543212',
                'nip' => '1234567892',
                'jabatan' => 'Jabatan 3',
                'no_hp' => '081234567892',
                'unit_kerja' => 'Unit 3',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 3,
                'perangkat_daerah_id' => 3,
                'status_permohonan_id' => 3,
            ],
            [
                'ktp' => '1234567893',
                'nama_lengkap' => 'Pemohon 4',
                'nik' => '9876543213',
                'nip' => '1234567893',
                'jabatan' => 'Jabatan 4',
                'no_hp' => '081234567893',
                'unit_kerja' => 'Unit 4',
                'tanggal_permohonan' => Carbon::now()->toDateString(),
                'waktu_permohonan' => Carbon::now()->toTimeString(),
                'kategori_id' => 4,
                'perangkat_daerah_id' => 4,
                'status_permohonan_id' => 4,
            ],
            [
                'ktp' => '1234567894',
                'nama_lengkap' => 'Pemohon 5',
                'nik' => '9876543214',
                'nip' => '1234567894',
                'jabatan' => 'Jabatan 5',
                'no_hp' => '081234567894',
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
