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
        $request->validate([
            'name' => 'required|min:2|max:15',
            'email' => 'required|email',
            'gender' => 'required',
            'address' => 'required|min:5|max:50',
            'number' => 'required|numeric|digits_between:10,10',
            'password' => 'required|min:6|max:20',
        ]);

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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ], [
            // 'email.required' => 'Email is Required'
        ]);

        $user = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user)) {
            return redirect('/home');
        } else {
            return back()->withErrors([
                'password' => 'The provided credentials do not match our records.',
                //'password' => 'password is worng'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
