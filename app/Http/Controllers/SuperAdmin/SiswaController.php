<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    public function index(){
        $data = Kelas::all();
        return view('superadmin.listkelassiswa', compact('data'));
    }

    public function tambahkelas(){
        $data = Guru::all();
        return view('superadmin.listkelassiswa-tambah', compact('data'));
    }

    public function tambahkelasPost(Request $request){
        $data = $request->validate([
            'wali_kelas' => 'required',
            'nama_kelas' => 'required',
            'tingkatan_kelas' => 'required',
            'kelompok_kelas' => 'required',
        ]);

        if ($data) {
            Kelas::create([
                'guru_id' => $request->wali_kelas,
                'nama_kelas' => $request->nama_kelas,
                'tingkatan' => $request->tingkatan_kelas,
                'kelompok_kelas' => $request->kelompok_kelas,
            ]);
            return redirect('/superadmin/listkelassiswa');
        } else {
            return redirect()->back();
        }
    }

    public function editkelas($kode){
        $data = Guru::all();
        $kelas = Kelas::find($kode);
        return view('superadmin.listkelassiswa-edit', compact('data', 'kode', 'kelas'));
    }

    public function editkelasPost(Request $request){
        $data = $request->validate([
            'kode' => 'required',
            'wali_kelas' => 'required',
            'nama_kelas' => 'required',
            'tingkatan_kelas' => 'required',
            'kelompok_kelas' => 'required',
        ]);

        if ($data) {
            Kelas::where('id', $request->kode)->update([
                'guru_id' => $request->wali_kelas,
                'nama_kelas' => $request->nama_kelas,
                'tingkatan' => $request->tingkatan_kelas,
                'kelompok_kelas' => $request->kelompok_kelas,
            ]);
            return redirect('/superadmin/listkelassiswa');
        } else {
            return redirect()->back();
        }
    }

    public function deletekelas($kode){
        Kelas::where('id', $kode)->delete();
        return redirect()->back();
    }

    public function listsiswa($kode){
        $siswa = Siswa::where('kelas_id', $kode)->get();
        $kelas = Kelas::find($kode);
        return view('superadmin.listsiswa', compact('siswa', 'kode', 'kelas'));
    }

    public function detailsiswa($kode){
        $data = Siswa::where('nisn', $kode)->first();
        return view('superadmin.listsiswa-detail', compact('data'));
    }

    public function tambahsiswa($kode){
        return view('superadmin.listsiswa-tambah', compact('kode'));
    }

    public function tambahsiswaPost(Request $request){
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
            'kelas' => 'required',
            'sa' => 'required',
            'nay' => 'required',
            'nib' => 'required',
            'aot' => 'required',
            'ntr' => 'required',
            'payah' => 'required',
            'pibuh' => 'required',
            'status' => 'required'
        ]);

        if ($data) {
            try {
                DB::beginTransaction();
                $user = User::create([
                    'name' => 'siswa',
                    'email'=> strtolower(strtok($request->nama, ' ')).'@siswa.com',
                    'password'=> Hash::make('siswa'),
                    'role'=> 'Siswa',
                ]);
    
                Siswa::create([
                    'nisn' => $request->nis,
                    'user_id' => $user->id,
                    'nama_siswa' => $request->nama,
                    'jenis_kelamin' => $request->jk,
                    'tempat_lahir' => $request->tempat,
                    'tanggal_lahir' => $request->tanggal,
                    'agama' => $request->agama,
                    'alamat' => $request->ap,
                    'no_hp' => $request->tl,
                    'kelas_id' => $request->kelas,
                    'status_dlm_klrg' => $request->sk,
                    'nama_ayah' => $request->nay,
                    'nama_ibu' => $request->nib,
                    'pekerjaan_ayah' => $request->payah,
                    'pekerjaan_ibu' => $request->payah,
                    'status_siswa' => $request->status,
                    'sekolah_asal' => $request->sa,
                    'anak_ke' => $request->ak,
                ]);
                DB::commit();
                return redirect('/superadmin/listkelassiswa');
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error while creating guru: ' . $e->getMessage());
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function editsiswa($kode){
        $data = Siswa::where('nisn', $kode)->first();
        return view('superadmin.listsiswa-edit', compact('data'));
    }

    public function editsiswaPost(Request $request){
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
            'status' => 'required'
        ]);

        if ($data) {
            Siswa::where('nisn', $request->nis)->update([
                'Nama_Siswa' => $request->nama,
                'Jenis_Kelamin' => $request->jk,
                'Tempat_Lahir' => $request->tempat,
                'Tanggal_Lahir' => $request->tanggal,
                'Agama' => $request->agama,
                'Alamat' => $request->ap,
                'No_hp' => $request->tl,
                'Status_dlm_Klrg' => $request->sk,
                'Nama_Ayah' => $request->nay,
                'Nama_Ibu' => $request->nib,
                'Pekerjaan_Ayah' => $request->payah,
                'Pekerjaan_Ibu' => $request->payah,
                'Status_Siswa' => $request->status,
                'Sekolah_Asal' => $request->sa,
                'Anak_Ke' => $request->ak,
            ]);
            return redirect('/superadmin/listkelassiswa');
        } else {
            return redirect()->back();
        }
    }

    public function deletesiswa($kode){
        Siswa::where('nisn', $kode)->delete();
        return redirect()->back();
    }
}
