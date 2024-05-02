<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use App\Models\Customer;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index()
    {
        $recentPurchases = Purchase::all();

        if(auth()->user()->role == 'Customer') {
            return view('denial.user');
        }

        return view('sells.index', ['recentPurchases' => $recentPurchases]);
    }
}
