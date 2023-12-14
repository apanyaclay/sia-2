<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Rapor;
use App\Models\Sikap;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaporController extends Controller
{
    public function index(){
        $siswa = Siswa::where('user_id', Auth::user()->id)->first();
        $rapor = DB::table('rapors')
            ->join('mata_pelajarans', 'mata_pelajarans.id', 'rapors.mapel_id')
            ->select('rapors.*', 'mata_pelajarans.*')
            ->get();

        $ekskul = DB::table('ekskul_siswas')
            ->join('ekstrakurikulers', 'ekstrakurikulers.id', 'ekskul_siswas.ekskul_id')
            ->join('nilai_ekskuls', 'nilai_ekskuls.ekskul_siswa_id', 'ekskul_siswas.id')
            ->where('ekskul_siswas.siswa_id', $siswa->nisn)
            ->select('ekskul_siswas.*', 'ekstrakurikulers.*', 'nilai_ekskuls.*')
            ->get();
        
        $prestasi = Prestasi::where('siswa_id', $siswa->nisn)->get();
        $sikap = Sikap::where('siswa_id', $siswa->nisn)->get();

        return view('siswa.rapor', compact('rapor', 'ekskul', 'prestasi', 'sikap'));
    }
}
