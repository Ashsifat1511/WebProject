<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $sells = Purchase::where('Customers_customerID', auth()->user()->customer->id)->get();
        $rentals = Rental::where('Customers_customerID', auth()->user()->customer->id)->get();
        return view('profiles.index', compact('sells', 'rentals'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required|unique:users,username,' . auth()->user()->id,
                'address' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'email' => 'required|email|unique:customers,email,' . auth()->user()->customer->id,
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'gender' => 'required'
            ]);

            $user = User::find(auth()->user()->id);
            $customer = Customer::find(auth()->user()->customer->id);

            $customer->update($request->only(['first_name', 'last_name', 'address', 'phone', 'email', 'gender']));

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('uploads/customers', $filename, 'public');
                $customer->photo = $filename;
                $user->photo = $filename;
            }

            $customer->save();
            $user->update([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'updated_at' => now()
            ]);

            return redirect()->route('users.profile')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return back()->withErrors('Update failed: ' . $e->getMessage());
        }
    }

    public function cart(Request $request)
    {
        return view('register');
    }
}
