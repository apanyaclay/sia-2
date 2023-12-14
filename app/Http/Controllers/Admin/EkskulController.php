<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EkskulSiswa;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EkskulController extends Controller
{
    public function index(){
        $data = DB::table('ekstrakurikulers')
            ->join('gurus', 'gurus.nuptk', 'ekstrakurikulers.guru_id')
            ->select('ekstrakurikulers.*', 'gurus.*')
            ->get();
        return view('admin.listekskul', compact('data'));
    }

    public function edit($kode){
        $data = Guru::all();
        $ekskul = Ekstrakurikuler::where('id', $kode)->first();
        return view('admin.listekskul-edit', compact('data', 'ekskul'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'guru' => 'required',
            'hari' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        if ($data) {
            Ekstrakurikuler::where('id', $request->kode)->update([
                'nama_ekskul' => $request->nama,
                'guru_id' => $request->guru,
                'hari' => $request->hari,
                'waktu_mulai' => $request->mulai,
                'waktu_selesai' => $request->selesai,
            ]);
            return redirect('/admin/listekskul');
        } else {
            return redirect()->back();
        }
    }
    
    public function tambah(){
        $data = Guru::all();
        return view('admin.listekskul-tambah', compact('data'));
    }

    public function tambahPost(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'guru' => 'required',
            'hari' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        if ($data) {
            Ekstrakurikuler::create([
                'nama_ekskul' => $request->nama,
                'guru_id' => $request->guru,
                'hari' => $request->hari,
                'waktu_mulai' => $request->mulai,
                'waktu_selesai' => $request->selesai,
            ]);
            return redirect('/admin/listekskul');
        } else {
            return redirect()->back();
        }
    }

    public function delete($kode){
        Ekstrakurikuler::where('id', $kode)->delete();
        return redirect()->back();
    }

    public function ekskulsiswa(){
        $data = DB::table('ekskul_siswas')
            ->join('ekstrakurikulers', 'ekstrakurikulers.id', 'ekskul_siswas.ekskul_id')
            ->join('siswas', 'siswas.nisn', 'ekskul_siswas.siswa_id')
            ->join('tahun_ajarans', 'tahun_ajarans.id', 'ekskul_siswas.tahun_ajaran_id')
            ->orderBy('ekskul_siswas.id')
            ->select('ekskul_siswas.*', 'ekskul_siswas.id as ids','ekstrakurikulers.*', 'siswas.*', 'tahun_ajarans.*')
            ->get();
        
        return view('admin.listekskulsiswa', compact('data'));
    }

    public function editEkskulSiswa($kode){
        $data = DB::table('ekskul_siswas')
            ->join('ekstrakurikulers', 'ekstrakurikulers.id', 'ekskul_siswas.ekskul_id')
            ->join('siswas', 'siswas.nisn', 'ekskul_siswas.siswa_id')
            ->join('tahun_ajarans', 'tahun_ajarans.id', 'ekskul_siswas.tahun_ajaran_id')
            ->where('ekskul_siswas.siswa_id', $kode)
            ->select('ekskul_siswas.*', 'ekskul_siswas.id as ids','ekstrakurikulers.*', 'siswas.*', 'tahun_ajarans.*')
            ->first();
        $ekskul = Ekstrakurikuler::all();
        $tahun = TahunAjaran::all();

        return view('admin.listekskulsiswa-edit', compact('data', 'ekskul', 'tahun'));
    }

    public function editEkskulSiswaPost(Request $request){
        $data = $request->validate([
            'ekskul' => 'required',
            'tahun' => 'required',
        ]);

        if ($data) {
            EkskulSiswa::where('id', $request->kode)->update([
                'ekskul_id' => $request->ekskul,
                'tahun_ajaran_id' => $request->tahun,
            ]);
            return redirect('/admin/listekskulsiswa');
        } else {
            return redirect()->back();
        }
    }
}
