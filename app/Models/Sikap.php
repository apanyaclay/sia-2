<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
    use HasFactory;
    protected $table = 'sikaps';
    protected $fillable = [
        "siswa_id","p_spiritual","d_spiritual","p_sosial","d_sosial"
    ];
}
