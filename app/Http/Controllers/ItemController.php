<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('itemName', 'LIKE', "%$query%")
                            ->orWhere('stock', 'LIKE', "%$query%")
                            ->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'itemName' => 'required',
        'stock' => 'required',
        'rentalOrSale' => 'required',
        'salePrice' => 'required',
        'rentRate' => 'required',
        'photo' => 'required',
        'itemType' => 'required'
    ]);

    // Create a new item
    $item = new Item();
    $item->itemName = $validatedData['itemName'];
    $item->stock = $validatedData['stock'];
    $item->rentalOrSale = $validatedData['rentalOrSale'];
    $item->salePrice = $validatedData['salePrice'];
    $item->rentRate = $validatedData['rentRate'];
    $item->photo = $request->file('photo')->store('directory');
    $item->itemType = $validatedData['itemType'];
    $item->save();

    return redirect()->route('items.index')->with('success', 'Item created successfully.');
}

    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'itemName' => 'required',
        'stock' => 'required|numeric',
        'rentalOrSale' => 'required',
        'salePrice' => 'required|numeric',
        'rentRate' => 'required|numeric',
        'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'itemType' => 'required'
    ]);

    try {
        $item = Item::findOrFail($id);
        // Update the item
        $item->itemName = $request->input('itemName');
        $item->stock = $request->input('stock');
        $item->rentalOrSale = $request->input('rentalOrSale');
        $item->salePrice = $request->input('salePrice');
        $item->rentRate = $request->input('rentRate');
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $photo->store('directory');
            $item->photo = $path;
        }

        $item->itemType = $request->input('itemType');
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating item: ' . $e->getMessage());
    }
}

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}