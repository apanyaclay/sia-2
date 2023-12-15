<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\KepalaSekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data = KepalaSekolah::where('user_id', Auth::user()->id)->first();
        return view('superadmin.profile', compact('data'));
    }

    public function edit(){
        $data = KepalaSekolah::where('user_id', Auth::user()->id)->first();
        return view('superadmin.profileedit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tmt_kerja' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenjang_pendidikan' => 'required',
            'status' => 'required'
            ]);

        if ($data) {
            KepalaSekolah::where('user_id', Auth::user()->id)->update([
                'nama_kepsek'=> $request->nama,
                'jenis_kelamin'=> $request->jenis_kelamin,
                'tempat_lahir'=> $request->tempat_lahir,
                'tanggal_lahir'=> $request->tanggal_lahir,
                'jenjang_pendidikan'=> $request->jenjang_pendidikan,
                'tmt_kerja'=> $request->tmt_kerja,
                'status'=> $request->status,
            ]);
            return redirect('/superadmin/profile');
        } else {
            return redirect()->back();
        }
    }

    public function editakun(){
        return view('superadmin.editakun');
    }

    public function editakunPost(Request $request){
        $data = $request->validate([
            'old'=> 'required',
            'new'=> 'required',
            'new_pas'=> 'required',
        ]);
        if ($data) {
            if (Hash::check($request->old, Auth::user()->password)) {
                User::where('id', Auth::user()->id)->update([
                    'password'=> Hash::make($request->new),
                ]);
                return redirect()->route('logout');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
