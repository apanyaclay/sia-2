<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiEkskul extends Model
{
    use HasFactory;

    protected $table = 'nilai_ekskuls';
    protected $fillable = [
        'ekskul_siswa_id',
        'nilai',
        'keterangan',
    ];
}
