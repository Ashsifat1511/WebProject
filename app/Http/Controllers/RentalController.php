<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Rental;


class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();

        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }

        return view('rentals.index', ['rentals' => $rentals]);
    }
}
