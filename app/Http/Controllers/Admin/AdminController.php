<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use File;

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
    function updateProfile(Request $request ,$id){
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        if($request->User_pic){
            $image = $request->file('User_pic');
            $customImageName = rand().".".$image->getClientOriginalExtension();
            $path = public_path("uploads/admin/".$customImageName);
            Image::make($image)->resize(150,150)->save($path);
            $admin->User_pic = $customImageName;
        }
        $admin->save();
        return back();
    }
    function changePassword(){
        return view('admin.changePassword');
    }
    function updatePassword(Request $request){
        $request->validate([
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required|same:newPassword'
        ]);

        $oldPassword = $request->oldPassword;
        $userOldPassword = Auth::user()->password;
        if(Hash::check($oldPassword,$userOldPassword)){
            $userFind = User::find(Auth::user()->id);
            $userFind->password = bcrypt($request->newPassword);
            $userFind->update();
            $notice = array(
                'type'=>'success',
                'message'=>'password updated successfully',
            );
            return redirect()->route('admin.dashboard')->with($notice);
        }
        else{
            $notice = array(
                'type'=>'error',
                'message'=>'old password is not matched',
            );
            return back()->with($notice);
        }

    }
}
