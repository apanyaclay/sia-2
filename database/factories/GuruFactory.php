<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nuptk'                 => $this->faker->unique()->numerify('##########'),
            'nip'                   => $this->faker->unique()->numerify('###############'),
            'nama_guru'             => $this->faker->name,
            'jenis_kelamin'         => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir'          => $this->faker->city,
            'tanggal_lahir'         => $this->faker->date,
            'status_kepegawaian'    => $this->faker->randomElement(['GTY/PTY', 'PNS']),
            'jenis_ptk'             => $this->faker->randomElement(['Guru Wali Kelas', 'Guru Mapel']),
            'jenjang_pendidikan'    => $this->faker->randomElement(['S1-Bahasa Indonesia', 'S1-Matematika', 'S1-Ilmu Pengetahuan Alam', 'S1-Ilmu Pengetahuan Sosial', 'S1-Pendidikan Seni', 'S1-Pendidikan Bahasa Inggris', 'S1-Pendidikan Pendidikan Jasmani dan Kesehatan', 'S1-Pendidikan Agama Islam', 'S1-Pendidikan Agama Katolik', 'S1-Pendidikan Agama Kristen', 'S1-Pendidikan Teknologi Informasi dan Komunikasi']),
            'tmt_kerja'             => $this->faker->date,
            'jjm'                   => $this->faker->numberBetween(20, 40),
            'status'                => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }
}
