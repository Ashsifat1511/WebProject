<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthManager extends Controller
{
    function login() {
        if(Auth::check()){
            if(Auth::user()->role=='Customer'){
                return redirect()->route('home');
            }
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
            if(Auth::user()->role=='Customer'){
                return redirect()->route('home');
            }
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with("error", "Invalid credentials");
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:customers',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required'
        ]);

        $user = new User;
        // Create a new customer
        $customer = new Customer();
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->username = $request->input('username');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->password = Hash::make($request->password);
        $customer->email = $request->input('email');
        $customer->gender = $request->input('gender');
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            // Specify the path within the public disk
            $path = $photo->storeAs('uploads/customers', $filename, 'public');
            $customer->photo = $filename;
            $user->photo = $filename;
            $customer->save();
        }

        $customer->save();

        $name = $customer->first_name . ' ' . $customer->last_name;

        $user->name = $name;
        $user->cid = Customer::all()->count();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->password);
        $user->role = 'Customer';

        $user->save();

        return redirect()->route('login')->with('success', 'Customer created successfully.');
    }

    function logout(){
        session()->flush();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

}
