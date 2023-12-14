<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkskulSiswa extends Model
{
    use HasFactory;

    protected $table = 'ekskul_siswas';
    protected $fillable = [
        'ekskul_id',
        'siswa_id',
        'tahun_ajaran_id',
    ];
}
