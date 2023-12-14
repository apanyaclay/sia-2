<?php

namespace Database\Seeders;

use App\Models\Sikap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SikapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sikap::create([
            "siswa_id"=> "78791950",
            "p_spiritual"=> "A",
            "d_spiritual"=> "Terbiasa berdoa sebelum dan sesudah melakukan kegiatan, menjalankan ibadah, memberi dan menjawab salam",
            "p_sosial"=> "A",
            "d_sosial"=> "Memiliki sikap social sangat baik, diantaranya : santun, disiplin, dan tanggung jawab yang baik, sangat responsif dalam pergaulan serta memiliki kepedulian sangat tinggi",
        ]);
    }
}
