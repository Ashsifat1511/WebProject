<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
    <link rel="stylesheet" href="css/accounts.css">
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
        <div><h3>Current time:</h3></div>
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
        <h1>Accounts Management</h1>

        <form action="{{ route('accounts.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search by name...">
            <button type="submit">Search</button>
        </form>

        <a href="{{ route('accounts.create') }}">New Account Add</a>

        <table>
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th>Account Name</th>
                    <th>Account Details</th>
                    <th>Customer ID</th>
                    <th> Issued By</th>
                    <th>Pay Method</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->accountID }}</td>
                    <td>{{ $account->accountName }}</td>
                    <td>{{ $account->accountDetails }}</td>
                    <td>{{ $account->Customers_customerID }}</td>
                    <td>{{ $account->User_username }}</td>
                    <td>{{ $account->payMethod }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="js/clock.js"></script>
</body>

</html>