<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data = Guru::where('user_id', Auth::user()->id)->first();
        return view('guru.profile', compact('data'));
    }

    public function edit(){
        $data = Guru::where('user_id', Auth::user()->id)->first();
        return view('guru.profileedit', compact('data'));
    }

    public function editPost(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'nuptk' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'jenjang' => 'required',
        ]);

        if ($data) {
            Guru::where('user_id', Auth::user()->id)->update([
                'nama_guru' => $request->nama,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenjang_pendidikan' => $request->jenjang,
            ]);
            return redirect('/guru/profile');
        } else {
            return redirect()->back();
        }
    }

    public function editakun(){
        return view('guru.editakun');
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
