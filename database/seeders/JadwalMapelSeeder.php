<?php

namespace Database\Seeders;

use App\Models\JadwalMapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '1',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '09:00:00',
            'waktu_selesai'     => '10:00:00',
            'hari'              => 'Senin',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '2',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '10:00:00',
            'waktu_selesai'     => '11:00:00',
            'hari'              => 'Senin',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '3',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '09:00:00',
            'waktu_selesai'     => '10:00:00',
            'hari'              => 'Selasa',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '4',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '10:00:00',
            'waktu_selesai'     => '11:00:00',
            'hari'              => 'Selasa',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '5',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '09:00:00',
            'waktu_selesai'     => '10:00:00',
            'hari'              => 'Rabu',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '6',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '10:00:00',
            'waktu_selesai'     => '11:00:00',
            'hari'              => 'Rabu',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '7',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '09:00:00',
            'waktu_selesai'     => '10:00:00',
            'hari'              => 'Kamis',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '8',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '10:00:00',
            'waktu_selesai'     => '11:00:00',
            'hari'              => 'Kamis',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '9',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '09:00:00',
            'waktu_selesai'     => '10:00:00',
            'hari'              => 'Jumat',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '10',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '10:00:00',
            'waktu_selesai'     => '11:00:00',
            'hari'              => 'Jumat',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '1',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '09:00:00',
            'waktu_selesai'     => '10:00:00',
            'hari'              => 'Sabtu',
        ]);

        JadwalMapel::create([
            'kelas_id'          => '1',
            'mapel_id'          => '2',
            'tahun_ajaran_id'   => '1',
            'waktu_mulai'       => '10:00:00',
            'waktu_selesai'     => '11:00:00',
            'hari'              => 'Sabtu',
        ]);
    }
}
