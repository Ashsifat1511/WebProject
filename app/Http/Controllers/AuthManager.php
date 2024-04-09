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

    function register() {
        if (Auth::check()) {
            return redirect()->route('login');
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with("error", "Invalid credentials");
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username', // Check unique username from 'users' table
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
    
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role; // Assign selected role from the form
    
        $user = User::create($data);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Failed to register');
        }
        return redirect()->route('login')->with('success','Registration successful. Please login');
    }

    function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
