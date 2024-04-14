<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
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
            <div class="headerimg"><img src="icons/customer.png" alt="logo"></div>
            <div class="headercontent">
                <h2>Customer Management</h2>
            </div>
        </div>
        <hr class="divide" />
        <div class="main">
            <div class="search">
                <form action="{{ route('customers.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search by name...">
                    <button type="submit"><img src="icons/search.png"></button>
                </form>
            </div>
            <div class="add">
                <h4>Add New Customer: </h4>
                <a href="{{ route('customers.create') }}"><img src="icons/add.png"></a>
            </div>
            <div class="showitem">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->gender}}</td>
                            <td><img src="{{ asset('uploads/customers/' . $customer->photo) }}" alt="photo" style="width: 100px; height: 100px;"></td>
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}"><img src="icons/edit.png"></a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this customer?')"><img src="icons/delete.png"></button>
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