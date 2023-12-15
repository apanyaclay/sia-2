<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function landing(){
        $data = Setting::find(1);
        return view('landingpage', compact('data'));
    }

    public function settings(){
        $data = Setting::find(1);
        return view('superadmin.settings',compact('data'));
    }

    public function editsettings(){
        $data = Setting::find(1);
        return view('superadmin.settings-edit',compact('data'));
    }

    public function editsettingsPost(Request $request){
        $data = $request->validate([
            'title'=> 'required',
            'tujuan'=> 'required',
            'visi_misi'=> 'required',
            'tentang'=> 'required',
            'alamat'=> 'required',
            'kec_kota'=> 'required',
            'provinsi'=> 'required',
            'phone'=> 'required',
        ]);
        if ($data) {
            Setting::where('id', 1)->update([
                'title' => $request->title,
                'tentang' => $request->tentang,
                'tujuan' => $request->tujuan,
                'visi_misi' => $request->visi_misi,
                'alamat' => $request->alamat,
                'kec_kota' => $request->kec_kota,
                'provinsi' => $request->provinsi,
                'phone' => $request->phone,
            ]);
            return redirect('/superadmin/settings');
        } else {
            return redirect()->back();
        }
    }
}
