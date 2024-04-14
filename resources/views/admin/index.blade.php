<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
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
        @if (auth()->user()->role === 'Employee')
        <h1>Access Denied</h1>
        @endif
        @if (auth()->user()->role === 'Admin')
        <div class="header">
            <div class ="headerimg"><img src="icons/admin.png" alt="logo"></div>
            <div class ="headercontent"><h2>Administrative</h2></div>
        </div>
        <br>
        <div class="Report">
            <h1>Report</h1>
            <br><br>
            <button class="button"><a href="/admin/sell-report">Total Sell</a></button>
            <button class="button"><a href="/admin/rent-report">Total Rental</a></button>
        </div>
        <br><br><br>
        <div class="emplyee-management">
            <h1>Employee Management</h1>
            <br><br>
            <button class="button"><a href="/admin/add-employee">Add Employee</a></button>
            <button class="button"><a href="/admin/show-employee">List Employee</a></button>
        </div>
        @endif
    </div>
    <script src="js/clock.js"></script>
</body>

</html>