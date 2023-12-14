<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSiswa extends Model
{
    use HasFactory;

    protected $table = 'wali_siswas';
    protected $fillable = [
        'id_wali',
        'nama_wali',
        'siswa_id',
        'pekerjaan_wali',
        'no_rek_bank',
        'bank_atas_nama',
    ];
}
