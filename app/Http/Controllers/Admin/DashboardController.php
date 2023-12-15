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

    public function audit(){
        return view('admin.audit');   
    }

    public function log_aktivitas(){
        return view('admin.log.log_aktivitas');   
    }

    public function log_guru(){
        return view('admin.log.log_guru');   
    }

    public function log_permission(){
        return view('admin.log.log_permission');   
    }

    public function log_profile(){
        return view('admin.log.log_profile');   
    }

    public function log_role(){
        return view('admin.log.log_role');   
    }

    public function log_user(){
        return view('admin.log.log_user');   
    }
}
