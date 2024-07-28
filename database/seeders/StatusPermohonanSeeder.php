<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('status_permohonan')->insert([
            ['status' => 'Pending'],
            ['status' => 'Approved'],
            ['status' => 'Rejected'],
            ['status' => 'In Progress'],
            ['status' => 'Completed'],
        ]);
    }
}
