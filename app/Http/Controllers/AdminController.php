<?php

namespace App\Http\Controllers;

use App\Exports\RentalsExport;
use App\Exports\SalesExport;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

use function Symfony\Component\String\b;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }
        return view('admin.index');
    }

    public function showSells()
    {
        $recentPurchases = Purchase::all();

        $totalSells = $recentPurchases->count();

        $totalAmount = $recentPurchases->sum('payAmount');

        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }

        return view('admin.sells', compact('recentPurchases', 'totalSells', 'totalAmount'));
    }

    public function showRentals()
    {
        $rentals = Rental::all();

        $customers = Customer::all();

        $totalRentals = $rentals->count();

        $totalAmount = $rentals->sum('paid');

        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }

        return view('admin.rentals', compact('rentals', 'totalRentals', 'totalAmount', 'customers'));
    }

    public function showUsers()
    {
        $employees = User::where('role', 'Admin')->orWhere('role', 'Employee')->get();

        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }


        return view('admin.employee', compact('employees'));
    }

    public function addEmployee()
    {
        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }


        return view('admin.add-employee');
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $data['cid'] = null;

        $user = User::create($data);

        if (!$user) {
            return redirect() - back()->with('error', 'Failed to add employee');
        }
        return redirect()->route('admin.employee')->with('success', 'Addition successful');
    }

    public function destroy($id)
    {
        $employee = User::find($id);
        $employee->delete();
        return redirect()->route('admin.employee')->with('success', 'Employee deleted successfully');
    }

    public function exportRentals()
    {
        return Excel::download(new RentalsExport, 'rentals-report.xlsx');
    }

    public function exportSales()
    {
        return Excel::download(new SalesExport, 'sales-report.xlsx');
    }

    public function editEmployee($id)
    {
        $employee = User::find($id);

        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }
        return view('admin.edit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'role' => 'required'
        ]);

        $employee = User::findOrFail($id);

        $employee->name = $request->name;
        $employee->username = $request->username;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->role = $request->role;

        $employee->save();

        if (!$employee) {
            return redirect()->back()->with('error', 'Failed to update employee');
        }

        return redirect()->route('admin.employee')->with('success', 'Employee updated successfully');
    }
}
