<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index()
    {
        $recentPurchases = Purchase::orderBy('purchaseID', 'desc')->limit(10)->get();

        return view('sells.index', ['recentPurchases' => $recentPurchases]);
    }

    public function create()
    {
        return view('sells.create');
    }

    public function store(Request $request)
    {
        // Create a new purchase
        $purchase = new Purchase();

        // Validate the request data
        $validationRules = [
            'purchaseDate' => 'required|date',
            'purchaseQuantity' => 'required|numeric',
            'User_username' => 'required|exists:users,username',
            'Item_itemID' => 'required|exists:items,itemID',
            'Customers_customerID' => 'required|exists:customers,id',
            'payAmount' => 'required|numeric',
        ];

        // Check if the item is for sale
        $item = Item::find($request->input('Item_itemID'));

        if ($item && $item->rentalOrSale === 'Sale') {
            //if stock is available, reduce the quantity
            if ($item->stock >= $request->input('purchaseQuantity')) {
                $item->stock -= $request->input('purchaseQuantity');
                $item->save();
            } else {
                return redirect()->route('sells.index')->with('error', 'Item is out of stock.');
            }
        }
        if ($item && $item->rentalOrSale === 'Rental') {
            return redirect()->route('sells.index')->with('error', 'Item is not for sale.');
        }
        // Validate the request data
        $request->validate($validationRules);

        // Assign values to the purchase object
        $purchase->purchaseDate = $request->input('purchaseDate');
        $purchase->purchaseQuantity = $request->input('purchaseQuantity');
        $purchase->User_username = $request->input('User_username');
        $purchase->Item_itemID = $request->input('Item_itemID');
        $purchase->Customers_customerID = $request->input('Customers_customerID');
        $purchase->payAmount = $request->input('payAmount');

        // Calculate the amount due only if the item is for sale
        if ($item && $item->rentalOrSale === 'Sale') {
            $purchase->amountDue = ($item->salePrice * $request->input('purchaseQuantity')) - $request->input('payAmount');
        }

        // Save the purchase
        $purchase->save();

        // Redirect with success message if data is validated
        return redirect()->route('sells.index')->with('success', 'Purchase added successfully.');
    }
}
