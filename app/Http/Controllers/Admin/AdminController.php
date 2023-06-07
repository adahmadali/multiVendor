<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function index(){
        return view('admin.dashboard');
    }
    function login(){
        return view('admin.login');
    }
    function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    function register(){
        return view('admin.register');
    }
    function profile(){
        $adminInfo = User::find(Auth::user()->id);
        return view('admin.profile',compact('adminInfo'));
    }
}
