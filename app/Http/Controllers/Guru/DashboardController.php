<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data = Guru::where('user_id', Auth::user()->id)->first();
        return view('guru.dashboard', compact('data'));
    }
    
}
