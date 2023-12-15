<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\MapelController as AdminMapelController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\TataUsahaController;
use App\Http\Controllers\Siswa\ProfileController;
use App\Http\Controllers\Siswa\RaporController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\MapelController as GuruMapelController;
use App\Http\Controllers\Guru\ProfileController as GuruProfileController;
use App\Http\Controllers\Guru\RaporController as GuruRaporController;
use App\Http\Controllers\Guru\SiswaController as GuruSiswaController;
use App\Http\Controllers\Siswa\DashboardController;
use App\Http\Controllers\Siswa\MapelController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\EkskulController as SuperAdminEkskulController;
use App\Http\Controllers\SuperAdmin\GuruController as SuperAdminGuruController;
use App\Http\Controllers\SuperAdmin\MapelController as SuperAdminMapelController;
use App\Http\Controllers\SuperAdmin\NilaiController as SuperAdminNilaiController;
use App\Http\Controllers\SuperAdmin\ProfileController as SuperAdminProfileController;
use App\Http\Controllers\SuperAdmin\RaporController as SuperAdminRaporController;
use App\Http\Controllers\SuperAdmin\SettingsController;
use App\Http\Controllers\SuperAdmin\SiswaController as SuperAdminSiswaController;
use App\Http\Controllers\SuperAdmin\TataUsahaController as SuperAdminTataUsahaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [SettingsController::class, 'landing']);

Route::fallback(function () {
    return redirect('/superadmin');
});

Route::redirect('/dashboard', '/superadmin/dashboard');

//Auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'forgotPasswordProcess'])->name('forgot-password-process');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-forgot-password');
    Route::post('/reset-password', [AuthController::class, 'resetPasswordPost'])->name('reset-password-process');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::group(['prefix' => 'superadmin', 'middleware' => 'role:Super Admin'], function () {
        Route::redirect('/', '/superadmin/dashboard');
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin');
        //Profile
        Route::get('/profile', [SuperAdminProfileController::class, 'index']);
        Route::get('/profile/edit', [SuperAdminProfileController::class, 'edit']);
        Route::post('/profile/edit', [SuperAdminProfileController::class, 'editPost']);
        Route::get('/akun/edit', [SuperAdminProfileController::class, 'editakun']);
        Route::post('/akun/edit', [SuperAdminProfileController::class, 'editakunPost']);
        //Setting
        Route::get('/settings', [SettingsController::class, 'settings']);
        Route::get('/settings/edit', [SettingsController::class, 'editsettings']);
        Route::post('/settings/edit', [SettingsController::class, 'editsettingsPost']);
        //Ekskul
        Route::get('/listekskul', [SuperAdminEkskulController::class, 'index']);
        Route::get('/listekskul/tambah', [SuperAdminEkskulController::class, 'tambah']);
        Route::post('/listekskul/tambah', [SuperAdminEkskulController::class, 'tambahPost']);
        Route::get('/listekskul/edit/{kode}', [SuperAdminEkskulController::class, 'edit']);
        Route::post('/listekskul/edit', [SuperAdminEkskulController::class, 'editPost']);
        Route::get('/listekskul/delete/{kode}', [SuperAdminEkskulController::class, 'delete']);
        //EkskulSiswa
        Route::get('/listekskulsiswa', [SuperAdminEkskulController::class, 'ekskulsiswa']);
        Route::get('/listekskulsiswa/edit/{kode}', [SuperAdminEkskulController::class, 'editEkskulSiswa']);
        Route::post('/listekskulsiswa/edit', [SuperAdminEkskulController::class, 'editEkskulSiswaPost']);
        //MapelSiswa
        Route::get('/listkelas', [SuperAdminMapelController::class, 'index']);
        Route::get('/jadwalsiswa/{kode}', [SuperAdminMapelController::class, 'jadwal']);
        //ListNilai
        Route::get('/listkelasnilai', [SuperAdminNilaiController::class, 'index']);
        Route::get('/listnilaisiswa/{kode}', [SuperAdminNilaiController::class, 'listsiswa']);
        Route::get('/listnilaisiswa/detail/{kode}', [SuperAdminNilaiController::class, 'detail']);
        Route::get('/listnilaisiswa/editnilai/{kode}', [SuperAdminNilaiController::class, 'editnilai']);
        Route::post('/listnilaisiswa/editnilai', [SuperAdminNilaiController::class, 'editnilaiPost']);
        //List Tata Usaha
        Route::get('/listtu', [SuperAdminTataUsahaController::class, 'index']);
        Route::get('/listtu/tambah', [SuperAdminTataUsahaController::class, 'tambah']);
        Route::post('/listtu/tambah', [SuperAdminTataUsahaController::class, 'tambahPost']);
        Route::get('/listtu/edit/{kode}', [SuperAdminTataUsahaController::class, 'edit']);
        Route::post('/listtu/edit', [SuperAdminTataUsahaController::class, 'editPost']);
        Route::get('/listtu/detail/{kode}', [SuperAdminTataUsahaController::class, 'detail']);
        Route::get('/listtu/delete/{kode}', [SuperAdminTataUsahaController::class, 'delete']);
        //List Guru
        Route::get('/listguru', [SuperAdminGuruController::class, 'index']);
        Route::get('/listguru/detail/{kode}', [SuperAdminGuruController::class, 'detail']);
        Route::get('/listguru/tambah', [SuperAdminGuruController::class, 'tambah']);
        Route::post('/listguru/tambah', [SuperAdminGuruController::class, 'tambahPost']);
        Route::get('/listguru/edit/{kode}', [SuperAdminGuruController::class, 'edit']);
        Route::post('/listguru/edit', [SuperAdminGuruController::class, 'editPost']);
        Route::get('/listguru/delete/{kode}', [SuperAdminGuruController::class, 'delete']);
        //Siswa
        Route::get('/listkelassiswa', [SuperAdminSiswaController::class, 'index']);
        Route::get('/listkelassiswa/tambah', [SuperAdminSiswaController::class, 'tambahkelas']);
        Route::post('/listkelassiswa/tambah', [SuperAdminSiswaController::class, 'tambahkelasPost']);
        Route::get('/listkelassiswa/edit/{kode}', [SuperAdminSiswaController::class, 'editkelas']);
        Route::post('/listkelassiswa/edit', [SuperAdminSiswaController::class, 'editkelasPost']);
        Route::get('/listkelassiswa/delete/{kode}', [SuperAdminSiswaController::class, 'deletekelas']);

        Route::get('/listsiswa/{kode}', [SuperAdminSiswaController::class, 'listsiswa']);
        Route::get('/listsiswa/detail/{kode}', [SuperAdminSiswaController::class, 'detailsiswa']);
        Route::get('/listsiswa/tambah/{kdoe}', [SuperAdminSiswaController::class, 'tambahsiswa']);
        Route::post('/listsiswa/tambah', [SuperAdminSiswaController::class, 'tambahsiswaPost']);
        Route::get('/listsiswa/edit/{kode}', [SuperAdminSiswaController::class, 'editsiswa']);
        Route::post('/listsiswa/edit', [SuperAdminSiswaController::class, 'editsiswaPost']);
        Route::get('/listsiswa/delete/{kode}', [SuperAdminSiswaController::class, 'deletesiswa']);
        //Rapor
        Route::get('/rapor', [SuperAdminRaporController::class, 'index']);
        Route::get('/rapor/listsiswa/{kode}', [SuperAdminRaporController::class, 'listsiswa']);
        Route::get('/rapor/listsiswa/raporsiswa/{kode}', [SuperAdminRaporController::class, 'raporsiswa']);
        //Mata Pelajaran
        Route::get('/mapel', [SuperAdminMapelController::class, 'mapel']);
        Route::get('/mapel/tambah', [SuperAdminMapelController::class, 'tambah']);
        Route::post('/mapel/tambah', [SuperAdminMapelController::class, 'tambahPost']);
        Route::get('/mapel/edit/{kode}', [SuperAdminMapelController::class, 'edit']);
        Route::post('/mapel/edit', [SuperAdminMapelController::class, 'editPost']);
        Route::get('/mapel/delete/{kode}', [SuperAdminMapelController::class, 'delete']);
        //Audit
        Route::get('/audit', [SuperAdminDashboardController::class, 'audit']);
        //Log
        Route::get('/log_absensi_ekskul', [SuperAdminDashboardController::class, 'absen_ekskul']);
        Route::get('/log_absensi_kelas', [SuperAdminDashboardController::class, 'absen_kelas']);
        Route::get('/log_ekskul_siswa', [SuperAdminDashboardController::class, 'ekskul_siswa']);
        Route::get('/log_ekskul', [SuperAdminDashboardController::class, 'ekskul']);
        Route::get('/log_guru', [SuperAdminDashboardController::class, 'guru']);
        Route::get('/log_jadwal_mapel', [SuperAdminDashboardController::class, 'jadwalmapel']);
        Route::get('/log_kelas', [SuperAdminDashboardController::class, 'kelas_log']);
        Route::get('/log_kepala_sekolah', [SuperAdminDashboardController::class, 'kepsek_log']);
        Route::get('/log_mata_pelajaran', [SuperAdminDashboardController::class, 'mapel_log']);
        Route::get('/log_nilai_ekskul', [SuperAdminDashboardController::class, 'nilai_ekskul_log']);
        Route::get('/log_nilai', [SuperAdminDashboardController::class, 'nilai_log']);
        Route::get('/log_prestasi', [SuperAdminDashboardController::class, 'prestasi_log']);
        Route::get('/log_rapor', [SuperAdminDashboardController::class, 'rapor_log']);
        Route::get('/log_role_assignment', [SuperAdminDashboardController::class, 'role_assign_log']);
        Route::get('/log_roles', [SuperAdminDashboardController::class, 'roles_log']);
        Route::get('/log_siswa', [SuperAdminDashboardController::class, 'siswalog']);
        Route::get('/log_status_kip_kps_pip', [SuperAdminDashboardController::class, 'kipkpspiplog']);
        Route::get('/log_wali_siswa', [SuperAdminDashboardController::class, 'walisiswalog']);
        Route::get('/log_tata_usaha', [SuperAdminDashboardController::class, 'tatausahalog']);
    });
    
    //Admin
    Route::group(['prefix' => 'admin', 'middleware' => 'role:Admin'], function () {
        Route::redirect('/', '/admin/dashboard');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin');
        //Profile
        Route::get('/profile', [AdminProfileController::class, 'index']);
        Route::get('/profile/edit', [AdminProfileController::class, 'edit']);
        Route::post('/profile/edit', [AdminProfileController::class, 'editPost']);
        Route::get('/akun/edit', [AdminProfileController::class, 'editakun']);
        Route::post('/akun/edit', [AdminProfileController::class, 'editakunPost']);
        //Ekskul
        Route::get('/listekskul', [EkskulController::class, 'index']);
        Route::get('/listekskul/tambah', [EkskulController::class, 'tambah']);
        Route::post('/listekskul/tambah', [EkskulController::class, 'tambahPost']);
        Route::get('/listekskul/edit/{kode}', [EkskulController::class, 'edit']);
        Route::post('/listekskul/edit', [EkskulController::class, 'editPost']);
        Route::get('/listekskul/delete/{kode}', [EkskulController::class, 'delete']);
        //EkskulSiswa
        Route::get('/listekskulsiswa', [EkskulController::class, 'ekskulsiswa']);
        Route::get('/listekskulsiswa/edit/{kode}', [EkskulController::class, 'editEkskulSiswa']);
        Route::post('/listekskulsiswa/edit', [EkskulController::class, 'editEkskulSiswaPost']);
        //MapelSiswa
        Route::get('/listkelas', [AdminMapelController::class, 'index']);
        Route::get('/jadwalsiswa/{kode}', [AdminMapelController::class, 'jadwal']);
        //ListNilai
        Route::get('/listkelasnilai', [NilaiController::class, 'index']);
        Route::get('/listnilaisiswa/{kode}', [NilaiController::class, 'listsiswa']);
        Route::get('/listnilaisiswa/detail/{kode}', [NilaiController::class, 'detail']);
        Route::get('/listnilaisiswa/editnilai/{kode}', [NilaiController::class, 'editnilai']);
        Route::post('/listnilaisiswa/editnilai', [NilaiController::class, 'editnilaiPost']);
        //List Tata Usaha
        Route::get('/listtu', [TataUsahaController::class, 'index']);
        Route::get('/listtu/edit/{kode}', [TataUsahaController::class, 'edit']);
        Route::post('/listtu/edit', [TataUsahaController::class, 'editPost']);
        Route::get('/listtu/detail/{kode}', [TataUsahaController::class, 'detail']);
        //List Guru
        Route::get('/listguru', [GuruController::class, 'index']);
        Route::get('/listguru/detail/{kode}', [GuruController::class, 'detail']);
        Route::get('/listguru/tambah', [GuruController::class, 'tambah']);
        Route::post('/listguru/tambah', [GuruController::class, 'tambahPost']);
        Route::get('/listguru/edit/{kode}', [GuruController::class, 'edit']);
        Route::post('/listguru/edit', [GuruController::class, 'editPost']);
        Route::get('/listguru/delete/{kode}', [GuruController::class, 'delete']);
        //Siswa
        Route::get('/listkelassiswa', [AdminSiswaController::class, 'index']);
        Route::get('/listkelassiswa/tambah', [AdminSiswaController::class, 'tambahkelas']);
        Route::post('/listkelassiswa/tambah', [AdminSiswaController::class, 'tambahkelasPost']);
        Route::get('/listkelassiswa/edit/{kode}', [AdminSiswaController::class, 'editkelas']);
        Route::post('/listkelassiswa/edit', [AdminSiswaController::class, 'editkelasPost']);
        Route::get('/listkelassiswa/delete/{kode}', [AdminSiswaController::class, 'deletekelas']);

        Route::get('/listsiswa/{kode}', [AdminSiswaController::class, 'listsiswa']);
        Route::get('/listsiswa/detail/{kode}', [AdminSiswaController::class, 'detailsiswa']);
        Route::get('/listsiswa/tambah/{kdoe}', [AdminSiswaController::class, 'tambahsiswa']);
        Route::post('/listsiswa/tambah', [AdminSiswaController::class, 'tambahsiswaPost']);
        Route::get('/listsiswa/edit/{kode}', [AdminSiswaController::class, 'editsiswa']);
        Route::post('/listsiswa/edit', [AdminSiswaController::class, 'editsiswaPost']);
        Route::get('/listsiswa/delete/{kode}', [AdminSiswaController::class, 'deletesiswa']);
        //Audit
        Route::get('/audit', [AdminDashboardController::class, 'audit']);
        Route::get('/log_aktivitas', [AdminDashboardController::class, 'log_aktivitas']);
        Route::get('/log_guru', [AdminDashboardController::class, 'log_guru']);
        Route::get('/log_permission', [AdminDashboardController::class, 'log_permission']);
        Route::get('/log_profile', [AdminDashboardController::class, 'log_profile']);
        Route::get('/log_role', [AdminDashboardController::class, 'log_role']);
        Route::get('/log_user', [AdminDashboardController::class, 'log_user']);
    });

    //Guru
    Route::group(['prefix' => 'guru', 'middleware' => 'role:Guru'], function () {
        Route::redirect('/', '/guru/dashboard');
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('guru');
         //Profile
         Route::get('/profile', [GuruProfileController::class, 'index']);
         Route::get('/profile/edit', [GuruProfileController::class, 'edit']);
         Route::post('/profile/edit', [GuruProfileController::class, 'editPost']);
         Route::get('/akun/edit', [GuruProfileController::class, 'editakun']);
         Route::post('/akun/edit', [GuruProfileController::class, 'editakunPost']);
         //JadwalMapel
         Route::get('/jadwalmengajar', [GuruMapelController::class, 'index']);
         //ListKelas
         Route::get('/listkelas', [GuruSiswaController::class, 'index']);
         //ListSiswa
         Route::get('/listsiswa/{kode}', [GuruSiswaController::class, 'listsiswa']);
         Route::get('/listsiswa/tambahnilai/{kode}', [GuruSiswaController::class, 'tambahnilai']);
         Route::post('/listsiswa/tambahnilai', [GuruSiswaController::class, 'tambahnilaiPost']);
         //ListNilaiSiswa
         Route::get('/listnilaisiswa/{kode}', [GuruSiswaController::class, 'listnilaisiswa']);
         Route::get('/listnilaisiswa/editnilai/{kode}', [GuruSiswaController::class, 'editnilai']);
         Route::post('/listnilaisiswa/editnilai', [GuruSiswaController::class, 'editnilaiPost']);
         //Rapor
         Route::get('/rapor', [GuruRaporController::class, 'index']);
         Route::get('/rapor/listsiswa/{kode}', [GuruRaporController::class, 'listsiswa']);
         Route::get('/rapor/listsiswa/{kode}', [GuruRaporController::class, 'listsiswa']);
         Route::get('/rapor/listsiswa/detail/{kode}', [GuruRaporController::class, 'detail']);
         Route::get('/rapor/listsiswa/edit/{kode}', [GuruRaporController::class, 'edit']);
         Route::post('/rapor/listsiswa/edit', [GuruRaporController::class, 'editPost']);
        
    });

    //Siswa
    Route::group(['prefix' => 'siswa', 'middleware' => 'role:Siswa'], function () {
        Route::redirect('/', '/siswa/dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('siswa');
        //Profile
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/profile/edit', [ProfileController::class, 'edit']);
        Route::post('/profile/edit', [ProfileController::class, 'editPost']);
        Route::get('/akun/edit', [ProfileController::class, 'editakun']);
        Route::post('/akun/edit', [ProfileController::class, 'editakunPost']);
        //JadwalMapel
        Route::get('/jadwalmapel', [MapelController::class, 'index']);
        //Rapor
        Route::get('/rapor', [RaporController::class, 'index']);
    });
});