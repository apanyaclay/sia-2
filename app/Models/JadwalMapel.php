<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
    use HasFactory;

    protected $table = 'jadwal_mapels';
    protected $fillable = [
        'kelas_id',
        'mapel_id',
        'tahun_ajaran_id',
        'waktu_mulai',
        'waktu_selesai',
        'hari',
    ];
}
