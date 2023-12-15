<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GuruController extends Controller
{
    public function index(){
        $data = Guru::all();
        return view('admin.listguru', compact('data'));
    }

    public function detail($kode){
        $data = Guru::where('nuptk', $kode)->first();
        return view('admin.listguru-detail', compact('data'));
    }

    public function tambah(){
        return view('admin.listguru-tambah');
    }

    public function tambahPost(Request $request){
        $data = $request->validate([
            'id' => 'required',
            'ids' => 'required',
            'nama'=> 'required',
            'jk'=> 'required',
            'tempat'=> 'required',
            'tanggal'=> 'required',
            'tmp_kerja'=> 'required',
            'jp'=> 'required',
            'status'=> 'required',
            'jns_ptk'=> 'required',
            'jjm'=> 'required',
            'statusK'=> 'required',
        ]);
        if ($data) {
            try {
                DB::beginTransaction();
                $user = User::create([
                    'name' => 'guru',
                    'email'=> strtolower(strtok($request->nama, ' ')).'@guru.com',
                    'password'=> Hash::make('guru'),
                    'role'=> 'Guru',
                ]);
    
                Guru::create([
                    'nuptk' => $request->id,
                    'user_id'=> $user->id,
                    'nip' => $request->ids,
                    'nama_guru' => $request->nama,
                    'jenis_kelamin' => $request->jk,
                    'tmt_kerja' => $request->tmp_kerja,
                    'tempat_lahir' => $request->tempat,
                    'tanggal_lahir' => $request->tanggal,
                    'jenjang_pendidikan' => $request->jp,
                    'status' => $request->status,
                    'status_kepegawaian' => $request->statusK,
                    'jjm' => $request->jjm,
                    'jenis_ptk' => $request->jns_ptk,
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error while creating guru: ' . $e->getMessage());
                return redirect()->back();
            }
            
            return redirect('/admin/listguru');
        } else {
            return redirect()->back();
        }
    }

    public function edit($kode){
        $data = Guru::where('nuptk', $kode)->first();
        return view('admin.listguru-edit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'id' => 'required',
            'ids' => 'required',
            'nama'=> 'required',
            'jk'=> 'required',
            'tempat'=> 'required',
            'tanggal'=> 'required',
            'tmp_kerja'=> 'required',
            'jp'=> 'required',
            'status'=> 'required',
            'jns_ptk'=> 'required',
            'jjm'=> 'required',
            'statusK'=> 'required',
        ]);
        if ($data) {
            Guru::where('nuptk', $request->id)->update([
                'nip' => $request->ids,
                'nama_guru' => $request->nama,
                'jenis_kelamin' => $request->jk,
                'tmt_kerja' => $request->tmp_kerja,
                'tempat_lahir' => $request->tempat,
                'tanggal_lahir' => $request->tanggal,
                'jenjang_pendidikan' => $request->jp,
                'status' => $request->status,
                'status_kepegawaian' => $request->statusK,
                'jjm' => $request->jjm,
                'jenis_ptk' => $request->jns_ptk,
            ]);
            return redirect('/admin/listguru');
        } else {
            return redirect()->back();
        }
    }

    public function delete($kode){
        Guru::where('nuptk', $kode)->delete();
        return redirect()->back();
    }
}
