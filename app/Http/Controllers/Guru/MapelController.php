<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(){
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        $mapel = MataPelajaran::where('guru_id', $guru->nuptk)->first();
        if ($mapel) {
            $data = DB::table('jadwal_mapels')
                ->join('kelas', 'kelas.id', 'jadwal_mapels.kelas_id')
                ->join('mata_pelajarans', 'mata_pelajarans.id', 'jadwal_mapels.mapel_id')
                ->join('tahun_ajarans', 'tahun_ajarans.id', 'jadwal_mapels.mapel_id')
                ->where('jadwal_mapels.mapel_id', $mapel->id)
                ->where('jadwal_mapels.tahun_ajaran_id', '1')
                ->orderBy('jadwal_mapels.hari')
                ->select('jadwal_mapels.*', 'kelas.*', 'mata_pelajarans.*', 'tahun_ajarans.*')
                ->get();
            $ta = $data[0]->tahun_ajaran;
        } else {
            $data = [];
            $ta = '';
        };
        
        return view('guru.jadwalmengajar', compact('data', 'ta'));
    }
}
