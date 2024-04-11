<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Rental;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch total sell amount for today
        $totalSellToday = Purchase::whereDate('purchaseDate', Carbon::today())->sum('payAmount');

        // Fetch total rent amount for today
        $totalRentToday = Rental::whereDate('rentalDate', Carbon::today())->sum('paid');

        // Fetch total due from purchase  for today

        $totalDueToday = Purchase::whereDate('purchaseDate', Carbon::today())->sum('amountDue');
        
        // Fetch total due from rental  for today
        $totalDueToday += Rental::whereDate('rentalDate', Carbon::today())->sum('amountDue');


        return view('dashboard', compact('totalSellToday', 'totalRentToday', 'totalDueToday'));
    }
}
