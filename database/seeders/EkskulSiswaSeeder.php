<?php

namespace Database\Seeders;

use App\Models\EkskulSiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkskulSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EkskulSiswa::create([
            'ekskul_id'         => '1',
            'siswa_id'          => '78791950',
            'tahun_ajaran_id'   => '1',
        ]);

        EkskulSiswa::create([
            'ekskul_id'         => '2',
            'siswa_id'          => '91676040',
            'tahun_ajaran_id'   => '1',
        ]);

        EkskulSiswa::create([
            'ekskul_id'         => '3',
            'siswa_id'          => '108254549',
            'tahun_ajaran_id'   => '1',
        ]);

        EkskulSiswa::create([
            'ekskul_id'         => '4',
            'siswa_id'          => '109600822',
            'tahun_ajaran_id'   => '1',
        ]);

        EkskulSiswa::create([
            'ekskul_id'         => '5',
            'siswa_id'          => '114715088',
            'tahun_ajaran_id'   => '1',
        ]);
    }
}
