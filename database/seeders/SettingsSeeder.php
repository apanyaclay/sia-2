<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'SISTEM INFORMASI AKADEMIK',
            'tentang' => 'SMP Swasta Amalyatul Huda adalah salah satu satuan pendidikan dengan jenjang SMP di Tanjung Mulia, Kec. Medan Deli, Kota Medan, Sumatera Utara. Dalam menjalankan kegiatannya, SMP Swasta Amalyatul Huda berada di bawah naungan Kementerian Pendidikan dan Kebudayaan. SMP Swasta Amalyatul Huda beralamat di Jl. Nusa Indah gg. Kilang Padi No. 44 Pasar 8, Tanjung Mulia, Kec. Medan Deli, Kota Medan, Sumatera Utara, dengan kode pos 20241. NPSN dari sekolah Amalyatul Huda adalah 69961293. SK Pendirian sekolah ini dikeluarkan pada 14 Maret 2017 dengan nomor 420/3727.Sarpras/2017. Selain itu, sekolah Amalyatul Huda juga telah terakreditasi C dengan SK Akreditasi nomor 789/BANSM/PROVSU/LL/X/2018 yang dikeluarkan pada 10 Oktober 2018.',
            'tujuan' => '1. Mengembangkan budaya sekolah yang religius melalui kegiatan keagamaan
            2. Mengadakan kegiatan yang mendukung prestasi siswa baik secara akademis maupun non akademis.
            3. Mewujudkan peserta didik yang bermoral dalam pembentukan karakter
            4. Membudayakan 5 S ( senyum, salam, sapa, sopan dan santun)
            5. Melaksanakan aktivitas siswa yang menghasilkan karya
            6. Melaksanakan kegiatan membersihkan lingkungan sekolah serta pengolahan sampah organik dan anorganik',
            'visi_misi' => 'Terwujudnya Peserta Didik Yang Bertaqwa, Cerdas Berkarakter, Kreatif Dan Berwawasan Lingkungan
            1. Menanamkan nilai-nilai ketaqwaan kepada Tuhan Yang Maha Esa
            2. Melaksanakan kegiatan keagamaan
            3. Menciptakan peserta didik yang unggul dalam berkompetisi
            4. Menciptakan peserta didik yang bermoral dan berbudi pekerti yang baik
            5. Mewujudkan peserta didik yang terampil dalam berkreasi
            6. Menciptakan lingkungan yang bersih, ama, dan tertib',
            'alamat' => 'No.44 A, Jl. Kilang Padi Pasar 8 veteran No.kel, Tj. Mulia',
            'kec_kota' => 'Kec. Medan Deli, Kota Medan',
            'provinsi' => 'Sumatera Utara, 20241',
            'phone' => '+62 853 7171 6868',
        ]);
    }
}
