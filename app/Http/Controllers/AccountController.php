<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();

        return view('accounts.index', ['accounts' => $accounts]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $accounts = Account::where('accountName', 'LIKE', "%$query%")
                            ->orWhere('accountDetails', 'LIKE', "%$query%")
                            ->get();
        return view('accounts.search', compact('accounts'));
    }
    public function create()
    {
        $customers = Customer::all();
        return view('accounts.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'accountName' => 'required',
            'accountDetails' => 'required',
            'Customers_customerID' => 'required|exists:customers,id',
            'payMethod' => 'required',
        ]);

        $account = Account::create([
            'accountName' => $request->input('accountName'),
            'accountDetails' => $request->input('accountDetails'),
            'Customers_customerID' => $request->input('Customers_customerID'),
            'User_username' => auth()->user()->username, // This will be the username of the currently logged in user
            'payMethod' => $request->input('payMethod'),
        ]);

        
        if(!$account){
            return back()->with('error', 'Failed to create account.');
        }

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');    

    }
}
