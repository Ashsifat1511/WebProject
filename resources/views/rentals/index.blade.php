@extends('index')

@section('title', 'Rentals')

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
    <div class="headerimg"><img src="icons/rent.png" alt="logo"></div>
    <div class="headercontent">
        <h2>Rent Management</h2>
    </div>
</div>
<hr class="divide" />
<div class="main">
    <div class="showitem">
        <table>
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Item Name</th>
                    <th>Customer Name</th>
                    <th>Rental Date</th>
                    <th>Return Date</th>
                    <th>Quantity</th>
                    <th>Paid</th>
                    <th>Return Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->item->itemName }}</td>
                    <td>{{ $rental->customer->first_name }}</td>
                    <td>{{ $rental->rentalDate }}</td>
                    <td>{{ $rental->returnDate }}</td>
                    <td>{{ $rental->quantity }}</td>
                    <td>{{ $rental->paid }}</td>
                    <td>
                        @if ($rental->isReturned)
                        Returned
                        @else
                        Not Returned
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection