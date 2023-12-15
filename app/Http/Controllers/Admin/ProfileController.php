<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TataUsaha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data = TataUsaha::where('user_id', Auth::user()->id)->first();
        return view('admin.profile', compact('data'));
    }

    public function edit(){
        $data = TataUsaha::where('user_id', Auth::user()->id)->first();
        return view('admin.profileedit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'nama'=> 'required',
            'jenis_kelamin'=> 'required',
            'tempat_kerja'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenjang'=> 'required',
        ]);

        if ($data) {
            TataUsaha::where('user_id', Auth::user()->id)->update([
                'nama_pegawai'=> $request->nama,
                'jenis_kelamin'=> $request->jenis_kelamin,
                'tempat_lahir'=> $request->tempat_kerja,
                'tanggal_lahir'=> $request->tanggal_lahir,
                'jenjang_pendidikan'=> $request->jenjang,
            ]);
            return redirect('/admin/profile');
        } else {
            return redirect()->back();
        }
    }

    public function editakun(){
        return view('admin.editakun');
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
