<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->number = $request->input('number');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/customerlogin');
    }

    public function login(Request $request)
    {
        //

        $user = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user)) {
            return redirect('/home');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        \ShoppingCart::destroy();
        return redirect('/home');
    }
}
