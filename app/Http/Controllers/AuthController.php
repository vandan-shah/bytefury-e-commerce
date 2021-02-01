<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->gender = $req->input('gender');
        $user->address = $req->input('address');
        $user->number = $req->input('number');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return redirect('/customerlogin');
    }

    public function login(Request $req)
    {
        // 

        $user = array(
            'email'=>$req->get('email'),
            'password'=>$req->get('password')
        );
        if(Auth::attempt($user))
        {
            return redirect('/home');
        }
        else {
            return "login failed";
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }


}
