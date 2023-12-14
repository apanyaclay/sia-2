<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        "siswa_id",
        "mapel_id",
        "ulha_1",
        "ulha_2",
        "uts",
        "ulha_3",
        "uas",
        "tahun_ajaran_id"
    ];
}
