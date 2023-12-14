<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\MapelController as AdminMapelController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
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
use App\Http\Controllers\SuperAdmin\SettingsController;

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