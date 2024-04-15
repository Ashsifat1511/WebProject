<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthManager extends Controller
{
    function login() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with("error", "Invalid credentials");
    }

    function logout(){
        session()->flush();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

}
