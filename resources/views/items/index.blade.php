<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="stylesheet" href="css/index.css">
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
                <li><a href="/accounts">Accounts</a></li>
                @if (auth()->user()->role === 'Admin')
                <li><a href="/admin">Administrative</a></li>
                @endif
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
        <div>
            <h3>Current time:</h3>
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
        <div class="success">
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
        <div class="header">
            <div class="headerimg"><img src="icons/trolley.png" alt="logo"></div>
            <div class="headercontent">
                <h2>Item Management</h2>
            </div>
        </div>
        <hr class="divide" />
        <div class="main">
            <div class="search">
                <form action="{{ route('items.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search by name...">
                    <button type="submit"><img src="icons/search.png"></button>
                </form>
            </div>
            <div class="add">
                <h4>Add New Item: </h4>
                <a href="{{ route('items.create') }}"><img src="icons/add.png"></a>
            </div>
            <div class="showitem">
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
                            <td><img src="{{ asset('uploads/items/' . $item->photo) }}" alt="photo" style="width: 100px; height: 100px;"></td>
                            <td>{{ $item->itemType }}</td>
                            <td>
                                <a href="{{ route('items.edit', $item->itemID) }}"><img src="icons/edit.png"></a>
                                <form action="{{ route('items.destroy', $item->itemID) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"><img src="icons/delete.png"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/clock.js"></script>
</body>

</html>