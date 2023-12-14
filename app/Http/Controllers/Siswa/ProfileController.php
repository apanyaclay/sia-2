<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data = Siswa::where('user_id', Auth::user()->id)->first();
        return view('siswa.profile',compact('data'));
    }

    public function edit(){
        $data = Siswa::where('user_id', Auth::user()->id)->first();
        return view('siswa.profileedit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'sk' => 'required',
            'ak' => 'required',
            'ap' => 'required',
            'tl' => 'required',
            'sa' => 'required',
            'nay' => 'required',
            'nib' => 'required',
            'aot' => 'required',
            'ntr' => 'required',
            'payah' => 'required',
            'pibuh' => 'required',
        ]);

        if ($data) {
            Siswa::where('user_id', Auth::user()->id)->update([
                'nama_siswa' => $request->nama,
                'jenis_kelamin' => $request->jk,
                'tempat_lahir' => $request->tempat,
                'tanggal_lahir' => $request->tanggal,
                'agama' => $request->agama,
                'alamat' => $request->ap,
                'no_hp' => $request->tl,
                'status_dlm_klrg' => $request->sk,
                'nama_ayah' => $request->nay,
                'nama_ibu' => $request->nib,
                'pekerjaan_ayah' => $request->payah,
                'pekerjaan_ibu' => $request->payah,
                'sekolah_asal' => $request->sa,
                'anak_ke' => $request->ak,
            ]);
            return redirect('/siswa/profile');
        } else {
            return redirect()->back();
        }
    }

    public function editakun(){
        return view('siswa.editakun');
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
