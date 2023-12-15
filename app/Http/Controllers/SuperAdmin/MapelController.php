<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(){
        $data = Kelas::all();
        return view('superadmin.listkelas',compact('data'));
    }

    public function jadwal($kode){
        $kelas = Kelas::where('id', $kode)->first();
        $jam = DB::table('jadwal_mapels')
            ->where('jadwal_mapels.kelas_id', $kode)
            ->groupBy('jadwal_mapels.waktu_mulai', 'jadwal_mapels.waktu_selesai')
            ->select('jadwal_mapels.waktu_mulai', 'jadwal_mapels.waktu_selesai')
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
        return view('superadmin.jadwalmapel', compact('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'jam', 'kelas'));
    }

    public function mapel(){
        $data = DB::table('mata_pelajarans')
            ->join('gurus', 'gurus.nuptk', 'mata_pelajarans.guru_id')
            ->select('mata_pelajarans.*', 'gurus.*')
            ->get();
        return view('superadmin.mapel', compact('data'));
    }

    public function tambah(){
        $data = Guru::all();
        return view('superadmin.mapel-tambah', compact('data'));
    }

    public function tambahPost(Request $request){
        $cek = $request->validate([
            'name' => 'required',
            'kkm' => 'required',
            'guru' => 'required',
        ]);
        if ($cek) {
            MataPelajaran::create([
                'nama_mapel'    => $request->name,
                'kkm'           => $request->kkm,
                'guru_id'       => $request->guru,
            ]);
            return redirect('/superadmin/mapel');
        } else {
            return redirect()->back();
        }
    }

    public function edit($kode){
        $data = MataPelajaran::find($kode);
        $guru = Guru::all();
        return view('superadmin.mapel-edit', compact('data', 'guru'));
    }

    public function editPost(Request $request){
        $cek = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'kkm' => 'required',
            'guru' => 'required',
        ]);
        if ($cek) {
            MataPelajaran::where('id', $request->id)->update([
                'nama_mapel'    => $request->name,
                'kkm'           => $request->kkm,
                'guru_id'       => $request->guru,
            ]);
            return redirect('/superadmin/mapel');
        } else {
            return redirect()->back();
        }
    }

    public function delete($kode){
        MataPelajaran::where('id', $kode)->delete();
        return redirect()->back();
    }
}
