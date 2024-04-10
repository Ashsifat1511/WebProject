<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentals</title>
    <link rel="stylesheet" href="css/rental.css">
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

        <a href="{{ route('rentals.create') }}">New Rental Add</a>

        <table>
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Item ID</th>
                    <th>Customer ID</th>
                    <th>Rental Date</th>
                    <th>Return Date</th>
                    <th>Quantity</th>
                    <th>Paid</th>
                    <th>Amount Due</th>
                    <th>Processed By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->rentalID }}</td>
                    <td>{{ $rental->Item_itemID }}</td>
                    <td>{{ $rental->Customers_customerID }}</td>
                    <td>{{ $rental->rentalDate }}</td>
                    <td>{{ $rental->returnDate }}</td>
                    <td>{{ $rental->quantity }}</td>
                    <td>{{ $rental->paid }}</td>
                    <td>{{ $rental->amountDue }}</td>
                    <td>{{ $rental->User_username }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="js/clock.js"></script>
</body>

</html>