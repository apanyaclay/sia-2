<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // User::create([
        //     'name'      => 'Super Admin',
        //     'email'     => 'syafrizal@gmail.com',
        //     'password'  => Hash::make('superadmin'),
        //     'role'     => 'Super Admin',
        // ]);

        // User::create([
        //     'name'      => 'Admin',
        //     'email'     => 'chandra@gmail.com',
        //     'password'  => Hash::make('admin'),
        //     'role'     => 'Admin',
        // ]);

        // User::create([
        //     'name'      => 'Admin',
        //     'email'     => 'nabila@gmail.com',
        //     'password'  => Hash::make('admin'),
        //     'role'     => 'Admin',
        // ]);

        // User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'herlia@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);

        // User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'putri@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'haris@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'syahputra@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'nurhasanah@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'della@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'siti@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'winastri@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'nursakinah@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);User::create([
        //     'name'      => 'Guru',
        //     'email'     => 'shafira@gmail.com',
        //     'password'  => Hash::make('guru'),
        //     'role'     => 'Guru',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'aditya@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'adam@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'aila@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'afdu@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'ahmad@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'abdul@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        // User::create([
        //     'name'      => 'Siswa',
        //     'email'     => 'dilla@gmail.com',
        //     'password'  => Hash::make('siswa'),
        //     'role'     => 'Siswa',
        // ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'lisandro@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'dennis@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'leone@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);

        User::create([
            'name'      => 'Siswa',
            'email'     => 'damon@gmail.com',
            'password'  => Hash::make('siswa'),
            'role'     => 'Siswa',
        ]);
    }
}
