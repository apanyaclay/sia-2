<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\TataUsaha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TataUsahaController extends Controller
{
    public function index(){
        $data = TataUsaha::all();
        return view('superadmin.listtu', compact('data'));
    }

    public function detail($kode){
        $data = TataUsaha::where('id_pegawai', $kode)->first();
        return view('superadmin.listtu-detail', compact('data'));
    }

    public function tambah(){
        return view('superadmin.listtu-tambah');
    }

    public function tambahPost(Request $request){
        $data = $request->validate([
            'id' => 'required',
            'nama'=> 'required',
            'jk'=> 'required',
            'tempat'=> 'required',
            'tanggal'=> 'required',
            'tmp_kerja'=> 'required',
            'jp'=> 'required',
            'status'=> 'required',
        ]);
        if ($data) {
            try {
                DB::beginTransaction();
                $user = User::create([
                    'name' => 'admin',
                    'email'=> strtolower(strtok($request->nama, ' ')).'@admin.com',
                    'password'=> Hash::make('admin'),
                    'role'=> 'Admin',
                ]);
    
                TataUsaha::create([
                    'id_pegawai' => $request->id,
                    'user_id' => $user->id,
                    'nama_pegawai' => $request->nama,
                    'jenis_kelamin' => $request->jk,
                    'tmt_kerja' => $request->tmp_kerja,
                    'tempat_lahir' => $request->tempat,
                    'tanggal_lahir' => $request->tanggal,
                    'jenjang_pendidikan' => $request->jp,
                    'status' => $request->status,
                ]);
                DB::commit();
                return redirect('/superadmin/listtu');
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error while creating admin: ' . $e->getMessage());
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function edit($kode){
        $data = TataUsaha::where('id_pegawai', $kode)->first();
        return view('superadmin.listtu-edit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'id' => 'required',
            'nama'=> 'required',
            'jk'=> 'required',
            'tempat'=> 'required',
            'tanggal'=> 'required',
            'jp'=> 'required',
            'tmt_kerja' => 'required',
            'status'=> 'required',
        ]);
        if ($data) {
            TataUsaha::where('id_pegawai', $request->id)->update([
                'nama_pegawai' => $request->nama,
                'jenis_kelamin' => $request->jk,
                'tempat_lahir' => $request->tempat,
                'tmt_kerja' => $request->tmt_kerja,
                'tanggal_lahir' => $request->tanggal,
                'jenjang_pendidikan' => $request->jp,
                'status' => $request->status,
            ]);
            return redirect('/superadmin/listtu');
        } else {
            return redirect()->back();
        }
    }

    public function delete($kode){
        TataUsaha::where('id_pegawai', $kode)->delete();
        return redirect()->back();
    }
}
