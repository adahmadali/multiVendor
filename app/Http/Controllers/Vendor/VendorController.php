<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use File;


class VendorController extends Controller
{
    function index(){
        return view('vendor.dashboard');
    }
    function login(){
        return view('vendor.login');
    }
    function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }
    function register(){
        return view('vendor.register');
    }
    function profile(){
        $vendorInfo = User::find(Auth::user()->id);
        return view('vendor.profile',compact('vendorInfo'));
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
            $path = public_path("uploads/vendor/".$customImageName);
            Image::make($image)->resize(150,150)->save($path);
            $admin->User_pic = $customImageName;
        }
        $admin->save();
        $notice = array(
            'type'=>'success',
            'message'=>'Update profile successfully',
        );
        return back()->with($notice);
    }
    function changePassword(){
        return view('vendor.changePassword');
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
            return redirect()->route('vendor.dashboard')->with($notice);
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
