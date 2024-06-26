<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="sidebar">
        <h2 >Menu</h2>
        <div class="menu">
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/items">Items</a></li>
                <li><a href="/customers">Customers</a></li>
                <li><a href="/sells">Sells</a></li>
                <li><a href="/rentals">Rentals</a></li>
                @if (auth()->user()->role === 'Admin')
                <li><a href="/admin">Administrative</a></li>
                @endif
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div>
            <h3 >Current time:</h3>
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
        <div class="header">
            <div class ="headerimg"><img src="icons/home.png" alt="logo"></div>
            <div class ="headercontent"><h2>Dashboard</h2></div>
        </div>
        <hr class="divide" />
        <div class="main">
            <div class="today">
                <div class="circle">
                <h3>Total Sell Amount Today: ${{ $totalSellToday }}</h3>
                </div>
                <div class="circle">
                <h3>Total Rent Amount Today: ${{ $totalRentToday }}</h3>
                </div>
            </div>
            
        </div>
    </div>

    <script src="js/clock.js"></script>
</body>

</html>