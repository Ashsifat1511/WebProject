<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
        return view('accounts.index', compact('accounts'));
    }
    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'accountName' => 'required',
            'accountDetails' => 'required',
            'Customers_customerID' => 'required|exists:customers,id',
            'User_username' => 'required|exists:users,username',
            'payMethod' => 'required',
        ]);

        Account::create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');    

    }
}
