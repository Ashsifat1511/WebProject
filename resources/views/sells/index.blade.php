<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sells</title>
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
            <div class="headerimg"><img src="icons/sell.png" alt="logo"></div>
            <div class="headercontent">
                <h2>Sell Management</h2>
            </div>
        </div>
        <hr class="divide" />
        <div class="main">
            <div class="add">
                <h4>Add New Purchase: </h4>
                <a href="{{ route('sells.create') }}"><img src="icons/add.png"></a>
            </div>
            <div class="showitem">
                <table>
                    <!-- Table headers -->
                    <thead>
                        <!-- Table row for headers -->
                        <tr>
                            <th>Purchase ID</th>
                            <th>Purchase Date</th>
                            <th>Quantity</th>
                            <th>Due</th>
                            <th>Username</th>
                            <th>Item ID</th>
                            <th>Customer ID</th>
                            <th>Amount Paid</th>
                            <th>Update Dues</th> <!-- New column for update option -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through recent purchases and display them -->
                        @foreach ($recentPurchases as $purchase)
                        <tr>
                            <!-- Display purchase details -->
                            <td>{{ $purchase->purchaseID }}</td>
                            <td>{{ $purchase->purchaseDate }}</td>
                            <td>{{ $purchase->purchaseQuantity }}</td>
                            <td>{{ $purchase->amountDue }}</td>
                            <td>{{ $purchase->User_username }}</td>
                            <td>{{ $purchase->Item_itemID }}</td>
                            <td>{{ $purchase->Customers_customerID }}</td>
                            <td>{{ $purchase->payAmount }}</td>
                            <!-- Button to update dues for this purchase -->
                            <td>
                                <a href="{{ route('sells.update-due', $purchase->purchaseID) }}"><img src="icons/update.png"></a>
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