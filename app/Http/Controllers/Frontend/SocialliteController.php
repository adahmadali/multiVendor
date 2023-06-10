<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialliteController extends Controller
{
    function create(){
        return Socialite::driver('google')->redirect();
    }
    function login(){
        $googleUser = Socialite::driver('google')->user();
        dd($googleUser);
        // $myUser = User::where('socialId',$googleUser->id)->first();
        // if(!empty($myUser)){
        //     Auth::login($googleUser);
        //     return redirect('/dashboard');

        // }else{
        //     $user = new User;
        //     $user->name = $googleUser->name;
        //     $user->email = $googleUser->email;
        //     $user->socialId = $googleUser->id;
        //     $user->User_pic = $googleUser->avater;
        //     $user->save();
        //     Auth::login($user);
        //     return redirect('/dashboard');

        // }
    }
}
