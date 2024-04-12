<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Rental;


class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();

        return view('rentals.index', ['rentals' => $rentals]);
    }

    public function create()
    {
        return view('rentals.create');
    }

    public function store(Request $request)
    {
        // Create a new rental
        $rental = new Rental();

        // Validate the request data
        $validationRules = [
            'rentalDate' => 'required|date',
            'returnDate' => 'required|date',
            'quantity' => 'required|numeric',
            'paid' => 'required|numeric',
            'User_username' => 'required|exists:users,username',
            'Item_itemID' => 'required|exists:items,itemID',
            'Customers_customerID' => 'required|exists:customers,id',
        ];

        $item = Item::find($request->input('Item_itemID'));

        if ($item && $item->rentalOrSale === 'Sale') {
            return redirect()->route('rentals.index')->with('error', 'Item is not for rent.');
        }

        if ($item && $item->rentalOrSale === 'Rental') {
            //if stock is available, reduce the quantity
            if ($item->stock >= $request->input('quantity')) {
                $item->stock -= $request->input('quantity');
                $item->save();
            } else {
                return redirect()->route('rentals.index')->with('error', 'Item is out of stock.');
            }
        }
        // Validate the request data
        $request->validate($validationRules);

        // Assign values to the rental object
        $rental->rentalDate = $request->input('rentalDate');
        $rental->returnDate = $request->input('returnDate');
        $rental->quantity = $request->input('quantity');
        $rental->paid = $request->input('paid');
        $rental->User_username = $request->input('User_username');
        $rental->Item_itemID = $request->input('Item_itemID');
        $rental->Customers_customerID = $request->input('Customers_customerID');

        if ($item && $item->rentalOrSale === 'Rental') {
            $rental->amountDue = ($item->rentRate * $request->input('quantity')) - $request->input('paid');
        }
        // Save the rental object
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'Rental added successfully.');
    }

    public function update($id)
    {
        $rental = Rental::find($id);

        return view('rentals.update-due', compact('rental'));
    }

    public function updateDue(Request $request, $id)
    {
        $request->validate([
            'newPayment' => 'required|numeric',
        ]);

        $rental = Rental::findOrFail($id);

        if($rental->amountDue < $request->input('newPayment')){
            return redirect()->route('rentals.index')->with('error', 'Payment is more than the amount due.');
        }

        $rental->amountDue -= $request->input('newPayment');
        $rental->paid += $request->input('newPayment');
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'Payment updated successfully.');
    }
}
