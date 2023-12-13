<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    protected $fillable = [
        'NUPTK',
        'Users_ID',
        'NIP',
        'Nama_Guru',
        'Jenis_Kelamin',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Status_Kepegawaian',
        'Jenis_PTK',
        'Jenjang_Pendidikan',
        'TMT_Kerja',
        'JJM',
        'Status',
    ];
}
