<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'NUPTK' => '1148770671130093',
            'Users_ID' => '4',
            'NIP' => '1222035608920007',
            'Nama_Guru' => 'Herlia Puspita Dewi A',
            'Jenis_Kelamin' => 'P',
            'Tempat_Lahir' => 'Pulau Raja',
            'Tanggal_Lahir' => '1992-08-16',
            'Status_Kepegawaian' => 'GTY/PTY',
            'Jenis_PTK' => 'Guru Wali Kelas',
            'Jenjang_Pendidikan' => 'S1-Bahasa Indonesia',
            'TMT_Kerja' => '2017-07-18',
            'JJM' => '36',
            'Status' => 'Aktif',
        ]);
    }
}
