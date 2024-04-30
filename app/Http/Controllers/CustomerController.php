<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $customers = Customer::where('first_name', 'LIKE', "%$query%")
            ->orWhere('last_name', 'LIKE', "%$query%")
            ->get();
        //return the search view with the results compacted to the view and css also
        return view('customer.search', compact('customers'));
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|exists:users,username',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:customers',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required'
        ]);

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
            $customer->photo = $filename; // Save the full path or just the filename, as needed
            $customer->save();
        }

        $customer->save();

        $user = new User;

        $name = $customer->first_name + $customer->last_name;

        $user->name = $name;
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->password);
        $user->role = 'Customer';

        $user->save();

        return redirect()->route('login')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:customers,email,' . $id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'nullable|in:Male,Female',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->gender = $request->input('gender');
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            // Specify the path within the public disk
            $path = $photo->storeAs('uploads/customers', $filename, 'public');
            $customer->photo = $filename; // Save the full path or just the filename, as needed
            $customer->save();
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        // Find the customer by ID and delete it
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
