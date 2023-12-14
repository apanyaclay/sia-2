<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    protected $fillable = [
        'nuptk',
        'user_id',
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_kepegawaian',
        'jenis_ptk',
        'jenjang_pendidikan',
        'tmt_kerja',
        'jjm',
        'status',
    ];
}
