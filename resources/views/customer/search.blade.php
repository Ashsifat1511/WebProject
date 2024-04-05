<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customers</title>
    <link rel="stylesheet" href="css/customersearch.css">
</head>
<body>
    <h1>Search Customers</h1>

    <form action="{{ route('customers.search') }}" method="GET">
        <div>
            <label for="query">Search by name, address, phone, or email:</label>
            <input type="text" id="query" name="query" value="{{ request()->input('query') }}">
        </div>
        <button type="submit">Search</button>
    </form>

    @if($customers->count() > 0)
        <h2>Search Results:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Gender</th>
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
                        <td>
                            @if($customer->photo)
                                <img src="{{ asset('storage/' . $customer->photo) }}" alt="Customer Photo" style="width: 100px;">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td>{{ $customer->gender }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No customers found.</p>
    @endif
</body>
</html>
