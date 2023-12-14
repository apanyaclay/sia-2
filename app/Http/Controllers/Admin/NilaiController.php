<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index(){
        $data = Kelas::all();
        return view('admin.listkelas-nilai', compact('data'));
    }

    public function listsiswa($kode){
        $kelas = Kelas::where('id', $kode)->first();
        $data = Siswa::where('kelas_id', $kode)->get();
        return view('admin.listnilaisiswa',compact('data', 'kelas'));
    }

    public function detail($kode){
        $siswa = Siswa::where('nisn', $kode)->first();
        $data = DB::table('nilais')
            ->join('mata_pelajarans', 'mata_pelajarans.id', 'nilais.mapel_id')
            ->join('tahun_ajarans', 'tahun_ajarans.id', 'nilais.tahun_ajaran_id')
            ->where('nilais.siswa_id', $siswa->nisn)
            ->where('nilais.tahun_ajaran_id', '1')
            ->select('nilais.*', 'nilais.id as ids', 'mata_pelajarans.*', 'tahun_ajarans.*')
            ->get();
        return view('admin.listnilaisiswa-detail', compact('data', 'siswa'));
    }

    public function editnilai($kode) {
        $nilai = Nilai::where('id', $kode)->first();

        return view('admin.editnilai', compact('kode', 'nilai'));
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
            return redirect('/admin/listkelasnilai');
        } else {
            return redirect()->back();
        }
    }
}
