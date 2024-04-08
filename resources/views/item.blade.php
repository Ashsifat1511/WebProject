<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="stylesheet" href="css/item.css">
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <div class="menu">
        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/items">Items</a></li>
            <li><a href="/customers">Customers</a></li>
            <li><a href="/sells">Sells</a></li>
            <li><a href="/rentals">Rentals</a></li>
            <li><a href="/update-due">Update Due</a></li>
            <li><a href="/accounts">Accounts</a></li>
            @if (auth()->user()->role === 'Admin')
                <li><a href="/admin">Administrative</a></li>
            @endif
            <li><a href="/logout">Logout</a></li>
        </ul>
        </div>
        <div id="clock" class="clock"></div>
        <div class="current-user">
            <ul>
                <li>Logged in as: {{ auth()->user()->name }}</li>
                <li>Role: {{ auth()->user()->role }}</li>
            </ul>
        </div>
    </div>
    
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>For Rent</th>
                                    <th>For Sale</th>
                                    <th>Rental Rate/Day</th>
                                    <th>Price</th>
                                    <th>Available Stock</th>
                                    <th>Actions</th> <!-- New column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventoryItems as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->for_rent ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->for_sale ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->rental_rate }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td class="table-actions">
                                            <a href="{{ route('items.edit', $item->id) }}">Edit</a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/clock.js"></script>
</body>
</html>
