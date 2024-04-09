<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Items</title>
    <link rel="stylesheet" href="css/customersearch.css">
</head>
<body>
    <h1>Search Items</h1>

    <form action="{{ route('items.search') }}" method="GET">
        <div>
            <label for="query">Search by name:</label>
            <input type="text" id="query" name="query" value="{{ request()->input('query') }}">
        </div>
        <button type="submit">Search</button>
    </form>

    @if($items->count() > 0)
        <h2>Search Results:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Stock</th>
                    <th>Rental/Sale</th>
                    <th>Sale Price</th>
                    <th>Rent Rate</th>
                    <th>Photo</th>
                    <th>Item Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->itemID }}</td>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->rentalOrSale }}</td>
                        <td>{{ $item->salePrice }}</td>
                        <td>{{ $item->rentRate }}</td>
                        <td>
                            @if($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="Item Photo" style="width: 100px;">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td>{{ $item->itemType }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item->itemID) }}">Edit</a>
                            <form action="{{ route('items.destroy', $item->itemID) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No items found.</p>
    @endif
</body>
</html>
