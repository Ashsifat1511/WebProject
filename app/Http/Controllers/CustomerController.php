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

        if (auth()->user()->role == 'Customer') {
            return view('denial.user');
        }

        return view('customer.index', compact('customers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $customers = Customer::where('first_name', 'LIKE', "%$query%")
            ->orWhere('last_name', 'LIKE', "%$query%")
            ->get();

        if (auth()->user()->role == 'Customer') {
            return view('denial.user');
        }
        return view('customer.search', compact('customers'));
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
