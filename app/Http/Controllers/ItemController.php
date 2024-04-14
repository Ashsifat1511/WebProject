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
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'itemType' => 'required'
    ]);

    // Create a new item
    $item = new Item();
    $item->itemName = $validatedData['itemName'];
    $item->stock = $validatedData['stock'];
    $item->rentalOrSale = $validatedData['rentalOrSale'];
    $item->salePrice = $validatedData['salePrice'];
    $item->rentRate = $validatedData['rentRate'];
    $item->itemType = $validatedData['itemType'];
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        // Specify the path within the public disk
        $path = $photo->storeAs('uploads/items', $filename, 'public');
        $item->photo = $filename; // Save the full path or just the filename, as needed
        $item->save();
    }
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
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('uploads/items', $filename, 'public');
            $item->photo = $filename;
            $item->save();
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