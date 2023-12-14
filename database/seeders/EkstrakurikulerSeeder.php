<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekstrakurikuler::create([
            'nama_ekskul'   => 'FUTSAL',
            'guru_id'       => '1554758660110042',
            'hari'          => 'Rabu',
            'waktu_mulai'   => '14:30:00',
            'waktu_selesai' => '16:30:00',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul'   => 'MENARI',
            'guru_id'       => '1148770671130093',
            'hari'          => 'Rabu',
            'waktu_mulai'   => '14:30:00',
            'waktu_selesai' => '16:30:00',
        ]);   

        Ekstrakurikuler::create([
            'nama_ekskul'   => 'MENYANYI',
            'guru_id'       => '1252771672230163',
            'hari'          => 'Rabu',
            'waktu_mulai'   => '14:30:00',
            'waktu_selesai' => '16:30:00',
        ]);   

        Ekstrakurikuler::create([
            'nama_ekskul'   => 'PRAKARYA',
            'guru_id'       => '5853776677230002',
            'hari'          => 'Rabu',
            'waktu_mulai'   => '14:30:00',
            'waktu_selesai' => '16:30:00',
        ]);   

        Ekstrakurikuler::create([
            'nama_ekskul'   => 'PENCAK SILAT',
            'guru_id'       => '2344763664110023',
            'hari'          => 'Rabu',
            'waktu_mulai'   => '14:30:00',
            'waktu_selesai' => '16:30:00',
        ]);   
    }
}
