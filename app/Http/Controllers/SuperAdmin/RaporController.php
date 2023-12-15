<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\Sikap;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaporController extends Controller
{
    public function index(){
        $data = Kelas::all();
        return view('superadmin.rapor', compact('data'));
    }

    public function listsiswa($kode){
        $kelas = Kelas::find($kode);
        $data = Siswa::where('kelas_id', $kode)->get();
        return view('superadmin.rapor-listsiswa', compact('data', 'kelas'));
    }

    public function raporsiswa($kode){
        $rapor = DB::table('rapors')
            ->join('mata_pelajarans', 'mata_pelajarans.id', 'rapors.mapel_id')
            ->where('rapors.siswa_id', $kode)
            ->select('rapors.*', 'mata_pelajarans.*')
            ->get();

        $ekskul = DB::table('ekskul_siswas')
            ->join('ekstrakurikulers', 'ekstrakurikulers.id', 'ekskul_siswas.ekskul_id')
            ->join('nilai_ekskuls', 'nilai_ekskuls.ekskul_siswa_id', 'ekskul_siswas.id')
            ->where('ekskul_siswas.siswa_id', $kode)
            ->select('ekskul_siswas.*', 'ekstrakurikulers.*', 'nilai_ekskuls.*')
            ->get();
        
        $prestasi = Prestasi::where('siswa_id', $kode)->get();
        $sikap = Sikap::where('siswa_id', $kode)->get();
        return view('superadmin.rapor-detail', compact('rapor', 'ekskul', 'prestasi', 'sikap'));
    }
}
