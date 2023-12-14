<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JadwalMapel;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(){
        $siswa = Siswa::where('user_id', Auth::user()->id)->first();
        $kelas = Kelas::where('id', $siswa->kelas_id)->first();
        $jam = DB::table('jadwal_mapels')
            ->select('jadwal_mapels.waktu_mulai', 'jadwal_mapels.waktu_selesai')
            ->groupBy('jadwal_mapels.waktu_mulai', 'jadwal_mapels.waktu_selesai')
            ->get();
        $senin = DB::table('jadwal_mapels')
        ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
        ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
        ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.tahun_ajaran_id')
        ->where('jadwal_mapels.kelas_id', $kelas->id)
        ->where('jadwal_mapels.hari', 'Senin')
        ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
        ->get();

        $selasa = DB::table('jadwal_mapels')
        ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
        ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
        ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.tahun_ajaran_id')
        ->where('jadwal_mapels.kelas_id', $kelas->id)
        ->where('jadwal_mapels.hari', 'Selasa')
        ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
        ->get();

        $rabu = DB::table('jadwal_mapels')
        ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
        ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
        ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.tahun_ajaran_id')
        ->where('jadwal_mapels.kelas_id', $kelas->id)
        ->where('jadwal_mapels.hari', 'Rabu')
        ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
        ->get();

        $kamis = DB::table('jadwal_mapels')
        ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
        ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
        ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.tahun_ajaran_id')
        ->where('jadwal_mapels.kelas_id', $kelas->id)
        ->where('jadwal_mapels.hari', 'Kamis')
        ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
        ->get();

        $jumat = DB::table('jadwal_mapels')
        ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
        ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
        ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.tahun_ajaran_id')
        ->where('jadwal_mapels.kelas_id', $kelas->id)
        ->where('jadwal_mapels.hari', 'Jumat')
        ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
        ->get();

        $sabtu = DB::table('jadwal_mapels')
        ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
        ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
        ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.tahun_ajaran_id')
        ->where('jadwal_mapels.kelas_id', $kelas->id)
        ->where('jadwal_mapels.hari', 'Sabtu')
        ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
        ->get();

        return view('siswa.jadwalmapel', compact('kelas', 'jam', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'));
    }
}
