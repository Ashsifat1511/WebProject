<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sells</title>
    <link rel="stylesheet" href="css/sells.css">
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
        <h1>Sells Management</h1>

        <a href="{{ route('sells.create') }}">New Purchase Add</a>

        <table>
            <thead>
                <tr>
                    <th>Purchase ID</th>
                    <th>Purchase Date</th>
                    <th>Quantity</th>
                    <th>Due</th>
                    <th>Username</th>
                    <th>Item ID</th>
                    <th>Customer ID</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentPurchases as $purchase)
                <tr>
                    <td>{{ $purchase->purchaseID }}</td>
                    <td>{{ $purchase->purchaseDate }}</td>
                    <td>{{ $purchase->purchaseQuantity }}</td>
                    <td>{{ $purchase->amountDue }}</td>
                    <td>{{ $purchase->User_username }}</td>
                    <td>{{ $purchase->Item_itemID }}</td>
                    <td>{{ $purchase->Customers_customerID }}</td>
                    <td>{{ $purchase->payAmount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="js/clock.js"></script>
</body>

</html>