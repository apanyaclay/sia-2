<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataUsaha extends Model
{
    use HasFactory;

    protected $table = 'tata_usahas';
    protected $fillable = [
        'id_pegawai',
        'user_id',
        'nama_pegawai',
        'jenis_kelamin',
        'tmt_kerja',
        'tempat_lahir',
        'tanggal_lahir',
        'jenjang_pendidikan',
        'status',
    ];
}
