<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login() {
        return view('auth.login');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' => 'required|'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect()->route(route:('home'));
        }

        return redirect('login')->with("error", "Invalid credentials");
    }

    function logout(){
        Auth::logout();
        return redirect('login')->with("success", "Logged out successfully");
    }

    function register(){
        return view('auth.register');
    }

    function registerPost(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()){
            return redirect()->intended(route('login'))
            ->with("success", "Successfully Registered");
        }

        return redirect(route('register'))->with("error", "Failed to register");
    }
}
