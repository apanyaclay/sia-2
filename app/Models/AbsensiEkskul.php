<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiEkskul extends Model
{
    use HasFactory;

    protected $table = 'absensi_ekskuls';

    protected $fillable = [
        "tanggal",
        "ekskul_siswa_id",
        "status",
    ];
}
