<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikulers';
    protected $fillable = [
        'nama_ekskul',
        'guru_id',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
    ];
}
