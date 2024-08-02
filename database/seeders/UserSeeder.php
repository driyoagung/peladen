<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Empty the table first
        DB::table('users')->delete();

        User::create([
            'email' => 'admin@gmail.com',
            'name' => "admin",
            'role' => "admin",
            "password" => Hash::make('admin123')
        ]);
        User::create([
            'email' => 'superadmin@gmail.com',
            'name' => "superadmin",
            'role' => "superadmin",
            "password" => Hash::make('superadmin123')
        ]);
        User::create([
            'email' => 'opd@gmail.com',
            'name' => "User OPD",
            'role' => "opd",
            "password" => Hash::make('opd123')
        ]);
        User::create([
            'email' => 'verifikator@gmail.com',
            'name' => "verifikator",
            'role' => "verifikator",
            "password" => Hash::make('verifikator123')
        ]);
    }
}
