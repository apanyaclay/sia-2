<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    use HasFactory;

    protected $table = 'kepala_sekolahs';
    protected $fillable = [
        'id_kepsek',
        'user_id',
        'nama_kepsek',
        'jenjang_pendidikan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'tmt_kerja',
        'status',
    ];
}
