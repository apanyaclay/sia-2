<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GuruSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            KepalaSekolahSeeder::class,
            TataUsahaSeeder::class,
            MataPelajaranSeeder::class,
            TahunAjaranSeeder::class,
            JadwalMapelSeeder::class,
            EkstrakurikulerSeeder::class,
            EkskulSiswaSeeder::class,
            NilaiEkskulSeeder::class,
            PrestasiSeeder::class,
            SettingsSeeder::class,
            RaporSeeder::class,
            SikapSeeder::class,
            NilaiSeeder::class,
        ]);
    }
}
