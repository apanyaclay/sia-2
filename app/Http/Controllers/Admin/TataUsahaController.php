<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TataUsaha;
use Illuminate\Http\Request;

class TataUsahaController extends Controller
{
    public function index(){
        $data = TataUsaha::all();
        return view('admin.listtu', compact('data'));
    }

    public function detail($kode){
        $data = TataUsaha::where('id_pegawai', $kode)->first();
        return view('admin.listtu-detail', compact('data'));
    }

    public function edit($kode){
        $data = TataUsaha::where('id_pegawai', $kode)->first();
        return view('admin.listtu-edit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'id' => 'required',
            'nama'=> 'required',
            'jk'=> 'required',
            'tempat'=> 'required',
            'tanggal'=> 'required',
            'jp'=> 'required',
        ]);
        if ($data) {
            TataUsaha::where('id_pegawai', $request->id)->update([
                'nama_pegawai' => $request->nama,
                'jenis_kelamin' => $request->jk,
                'tempat_lahir' => $request->tempat,
                'tanggal_lahir' => $request->tanggal,
                'jenjang_pendidikan' => $request->jp,
            ]);
            return redirect('/admin/listtu');
        } else {
            return redirect()->back();
        }
    }

    public function delete($kode){
        TataUsaha::where('id_pegawai', $kode)->delete();
        return redirect()->back();
    }
}
