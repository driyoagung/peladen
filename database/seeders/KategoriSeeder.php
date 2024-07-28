<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['kategori_layanan' => 'Layanan 1'],
            ['kategori_layanan' => 'Layanan 2'],
            ['kategori_layanan' => 'Layanan 3'],
            ['kategori_layanan' => 'Layanan 4'],
            ['kategori_layanan' => 'Layanan 5'],
        ]);
    }
}
