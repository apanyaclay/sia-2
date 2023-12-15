<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AbsensiKelas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\Sikap;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaporController extends Controller
{
    public function index(){
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        $data = Kelas::where('guru_id', $guru->nuptk)->get();
        return view('guru.rapor', compact('data'));
    }

    public function listsiswa($kode){
        $kelas = Kelas::where('id', $kode)->first();
        $data = Siswa::where('kelas_id', $kode)->get();
        return view('guru.raporlistsiswa', compact('kelas', 'data'));
    }

    public function detail($kode){
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
        $sakit = AbsensiKelas::where(['siswa_id' => $kode, 'status' => 'Sakit'])->get();
        $izin = AbsensiKelas::where(['siswa_id' => $kode, 'status' => 'Izin'])->get();
        $alpa = AbsensiKelas::where(['siswa_id' => $kode, 'status' => 'Alpa'])->get();

        return view('guru.rapordetail', compact('rapor', 'ekskul', 'prestasi', 'sikap', 'sakit', 'izin', 'alpa'));
    }

    public function edit($kode){
        $data = Sikap::where('siswa_id', $kode)->get();
        return view('guru.raporedit', compact('data', 'kode'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'id' => 'required',
            'nisn' => 'required',
            'pre_spir'=> 'required',
            'des_spir'=> 'required',
            'pre_sol'=> 'required',
            'des_sol'=> 'required',
        ]);
        if ($data) {
            Sikap::where('id', $request->id)->update([
                'p_spiritual'   => $request->pre_spir,
                'd_spiritual'   => $request->des_spir,
                'p_sosial'      => $request->pre_sol,
                'd_sosial'      => $request->des_sol,
            ]);
            return redirect('/guru/rapor');
        } else {
            return redirect()->back();
        }
    }
}
