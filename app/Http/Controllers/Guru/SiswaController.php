<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
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
                ->groupBy('jadwal_mapels.kelas_id', 'kelas.nama_kelas')
                ->select('jadwal_mapels.kelas_id', 'kelas.nama_kelas')
                ->get();
        } else {
            $data = [];
        };
        return view('guru.listkelas', compact('data'));
    }

    public function listsiswa($kode){
        $kelas = Kelas::where('id', $kode)->first();
        $data = Siswa::where('kelas_id', $kode)->get();
        return view('guru.listsiswa', compact('data', 'kelas'));
    }

    public function listnilaisiswa($kode){
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        $siswa = Siswa::where('nisn', $kode)->first();
        $data = DB::table('nilais')
            ->join('mata_pelajarans', 'mata_pelajarans.id', 'nilais.mapel_id')
            ->join('tahun_ajarans', 'tahun_ajarans.id', 'nilais.tahun_ajaran_id')
            ->where('nilais.siswa_id', $siswa->nisn)
            ->where('nilais.tahun_ajaran_id', '1')
            ->where('mata_pelajarans.guru_id', $guru->nuptk)
            ->select('nilais.*', 'nilais.id as ids', 'mata_pelajarans.*', 'tahun_ajarans.*')
            ->get();
        return view('guru.listnilaisiswa', compact('data', 'siswa'));
    }

    public function editnilai($kode) {
        $nilai = Nilai::where('id', $kode)->first();

        return view('guru.editnilai', compact('kode', 'nilai'));
    }

    public function editnilaiPost(Request $request) {
        $data = $request->validate([
            'id' => 'required',
            'uh1'=> 'required',
            'uh2'=> 'required',
            'uh3'=> 'required',
            'uts'=> 'required',
            'uas'=> 'required',
        ]);
        if ($data) {
            DB::table('nilais')->where('id', $request->id)->update([
                'ulha_1' => $request->uh1,
                'ulha_2' => $request->uh2,
                'uts' => $request->uts,
                'ulha_3' => $request->uh3,
                'uas' => $request->uas,
            ]);
            return redirect('/guru/listkelas');
        } else {
            return redirect()->back();
        }
    }

    public function tambahnilai($kode) {
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        $mapel = MataPelajaran::where('guru_id', $guru->nuptk)->first();
        $ta = TahunAjaran::all();

        return view('guru.tambahnilai', compact('kode', 'mapel', 'ta'));
    }

    public function tambahnilaiPost(Request $request) {
        $data = $request->validate([
            'nis'=> 'required',
            'kode'=> 'required',
            'ta'=> 'required',
            'uh1'=> 'required',
            'uh2'=> 'required',
            'uh3'=> 'required',
            'uts'=> 'required',
            'uas'=> 'required',
        ]);
        if ($data) {
            DB::table('nilais')->insert([
                'siswa_id' => $request->nis,
                'mapel_id' => $request->kode,
                'ulha_1' => $request->uh1,
                'ulha_2' => $request->uh2,
                'uts' => $request->uts,
                'ulha_3' => $request->uh3,
                'uas' => $request->uas,
                'tahun_ajaran_id' => $request->ta,
            ]);
            return redirect('/guru/listkelas');
        } else {
            return redirect()->back();
        }
    }
}
