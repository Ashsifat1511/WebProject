<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gamingitems = Item::where('itemType', 'Gaming')->get();
        $electronicsitems = Item::where('itemType', 'Electronics')->get();
        $othersitems = Item::where('itemType', 'Others')->get();

        if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Employee') {
            return view('denial.admin');
        }
        return view('users.home', compact('gamingitems', 'electronicsitems', 'othersitems'));
    }

    public function gaming()
    {
        $gamingitems = Item::where('itemType', 'Gaming')->get();

        if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Employee') {
            return view('denial.admin');
        }


        return view('users.gaming', compact('gamingitems'));
    }

    public function electronics()
    {
        $electronicsitems = Item::where('itemType', 'Electronics')->get();

        if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Employee') {
            return view('denial.admin');
        }

        return view('users.electronics', compact('electronicsitems'));
    }

    public function others()
    {
        $othersitems = Item::where('itemType', 'Others')->get();

        if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Employee') {
            return view('denial.admin');
        }
        return view('users.others', compact('othersitems'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:1',
        ]);

        $search = $request->input('search');

        $items = Item::where('itemName', 'like', '%' . $search . '%')->get();

        if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Employee') {
            return view('denial.admin'); // Assuming 'denial.admin' is a view handling unauthorized access
        }

        if ($items->isEmpty()) {
            return view('search.home')->with('error', 'No items found');
        }

        return view('search.home', compact('items'));
    }
}
