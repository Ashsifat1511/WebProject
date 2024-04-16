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
    <div class="add">
        <h4>Add New Rent: </h4>
        <a href="{{ route('rentals.create') }}"><img src="icons/add.png"></a>
    </div>
    <div class="showitem">
        <table>
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Item ID</th>
                    <th>Customer ID</th>
                    <th>Rental Date</th>
                    <th>Return Date</th>
                    <th>Quantity</th>
                    <th>Paid</th>
                    <th>Amount Due</th>
                    <th>Processed By</th>
                    <th>Return Status</th>
                    <th>Update Due</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->rentalID }}</td>
                    <td>{{ $rental->Item_itemID }}</td>
                    <td>{{ $rental->Customers_customerID }}</td>
                    <td>{{ $rental->rentalDate }}</td>
                    <td>{{ $rental->returnDate }}</td>
                    <td>{{ $rental->quantity }}</td>
                    <td>{{ $rental->paid }}</td>
                    <td>{{ $rental->amountDue }}</td>
                    <td>{{ $rental->User_username }}</td>
                    <td>
                        @if ($rental->isReturned)
                        Returned
                        @else
                        Not Returned
                        @endif
                    </td>
                    <td><a href="{{ route('rentals.update-due', $rental->rentalID) }}"><img src="icons/update.png"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection