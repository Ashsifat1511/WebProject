@extends('index')

@section('title', 'Customers')

@section('content')
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
    <div class="showitem">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
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
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->gender}}</td>
                    <td><img src="{{ asset('uploads/customers/' . $customer->photo) }}" alt="photo" style="width: 100px; height: 100px;"></td>
                    <td>
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
@endsection