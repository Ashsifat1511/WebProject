<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showSells()
    {
        $recentPurchases = Purchase::all();

        $totalSells = $recentPurchases->count();

        $totalAmount = $recentPurchases->sum('payAmount');

        $totalDue = $recentPurchases->sum('amountDue');

        return view('admin.sells', compact('recentPurchases', 'totalSells', 'totalAmount', 'totalDue'));
    }

    public function showRentals()
    {
        $rentals = Rental::all();

        $totalRentals = $rentals->count();

        $totalAmount = $rentals->sum('paid');

        $totalDue = $rentals->sum('amountDue');

        return view('admin.rentals', compact('rentals', 'totalRentals', 'totalAmount', 'totalDue'));
    }

    public function showUsers()
    {
        $employees = User::all();
        return view('admin.employee', compact('employees'));
    }

    public function addEmployee()
    {
        return view('admin.add-employee');
    }

    public function storeEmployee(Request $request)
    {
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
        return redirect()->route('admin.employee')->with('success', 'Addition successful');
    }
    
    public function destroy($id)
    {
        $employee = User::find($id);
        $employee->delete();
        return redirect()->route('admin.employee')->with('success', 'Employee deleted successfully');
    }
}
