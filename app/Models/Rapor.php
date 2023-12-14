<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $table = 'rapors';
    protected $fillable = [
        "siswa_id",
        "guru_id",
        "mapel_id",
        "p_nilai",
        "p_predikat",
        "p_deskripsi",
        "k_nilai",
        "k_predikat",
        "k_deskripsi",
    ];
}
