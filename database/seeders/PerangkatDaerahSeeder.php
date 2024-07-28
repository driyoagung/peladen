<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerangkatDaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('perangkat_daerah')->insert([
            ['perangkat_daerah' => 'Perangkat Daerah 1'],
            ['perangkat_daerah' => 'Perangkat Daerah 2'],
            ['perangkat_daerah' => 'Perangkat Daerah 3'],
            ['perangkat_daerah' => 'Perangkat Daerah 4'],
            ['perangkat_daerah' => 'Perangkat Daerah 5'],
        ]);
    }
}
