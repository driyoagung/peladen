<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubDomainHostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('sub_domain_hosting')->insert([
            [
                'nama_pemohon' => 'Pemohon 1',
                'nip_nik' => '1234567890',
                'nama_website_aplikasi' => 'Website 1',
                'nama_subdomain_dipinta' => 'subdomain1',
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
                'nama_website_aplikasi' => 'Website 2',
                'nama_subdomain_dipinta' => 'subdomain2',
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
                'nama_website_aplikasi' => 'Website 3',
                'nama_subdomain_dipinta' => 'subdomain3',
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
                'nama_website_aplikasi' => 'Website 4',
                'nama_subdomain_dipinta' => 'subdomain4',
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
                'nama_website_aplikasi' => 'Website 5',
                'nama_subdomain_dipinta' => 'subdomain5',
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
