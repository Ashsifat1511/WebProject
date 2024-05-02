<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Items</title>
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
</head>
<body>
    <a href="{{ route('items.index') }}">Back to Item</a>

    @if($items->count() > 0)
        <h2>Search Results:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Stock</th>
                    <th>Rental/Sale</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Item Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->itemID }}</td>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->rentalOrSale }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            @if($item->photo)
                                <img src="{{ asset('uploads/items/' . $item->photo) }}" alt="Item Photo" style="width: 100px;">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td>{{ $item->itemType }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No items found.</p>
    @endif
</body>
</html>