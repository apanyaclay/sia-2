<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TataUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data = TataUsaha::where('user_id', Auth::user()->id)->first();
        return view('admin.dashboard', compact('data'));
    }
}
