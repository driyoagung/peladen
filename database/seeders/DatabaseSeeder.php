<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            PerangkatDaerahSeeder::class,
            StatusPermohonanSeeder::class,
            LayananSPLPSeeder::class,
            LayananTTESeeder::class,
            LayananVPNSeeder::class,
            LayananKontenMultimediaSeeder::class,
            LayananZoomSeeder::class,
            JaringanInternetSeeder::class,
            KategoriSeeder::class,
            SubDomainHostingSeeder::class,

        ]);
    }
}
