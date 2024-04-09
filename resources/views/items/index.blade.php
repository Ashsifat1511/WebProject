<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="stylesheet" href="css/customer.css">
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
        <div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif
        </div>
        <h1>Items Management</h1>

        <form action="{{ route('items.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search by name...">
            <button type="submit">Search</button>
        </form>

        <a href="{{ route('items.create') }}">Add New Item</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
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
                    <td>{{ $item->photo }}</td>
                    <td>{{ $item->itemType }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->itemID) }}">Edit</a>
                        <form action="{{ route('items.destroy', $item->itemID) }}" method="POST">
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
    <script src="js/clock.js"></script>
</body>

</html>