<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative</title>
    <link rel="stylesheet" href="css/dashboard.css">
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
        <h2>Administrative</h2>
        <p>Welcome to the administrative</p>
    </div>
    <script src="js/clock.js"></script>
</body>
</html>
