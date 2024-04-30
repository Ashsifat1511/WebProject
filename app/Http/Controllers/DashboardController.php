<?php

namespace App\Http\Controllers;

use App\Models\Item;
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

        $recentPurchases = Purchase::all();
        $rentals = Rental::all();

        //check the total number of items which are out of stock
        $outOfStock = Item::where('stock', 0)->count();

        return view('dashboard', compact('totalSellToday', 'totalRentToday', 'outOfStock'));
    }
}
