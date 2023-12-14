<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data = Siswa::where('user_id', Auth::user()->id)->first();
        return view('siswa.dashboard', compact('data'));
    }
}
