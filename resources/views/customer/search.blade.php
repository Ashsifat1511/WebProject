<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customers</title>
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
</head>

<body>
    <a href="{{ route('customers.index') }}">Back to Customer</a>

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
                    <img src="{{ asset('uploads/customers/' . $customer->photo) }}" alt="Customer Photo" style="width: 100px;">
                    @else
                    No Photo
                    @endif
                </td>
                <td>{{ $customer->gender }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No customers found.</p>
    @endif
</body>

</html>