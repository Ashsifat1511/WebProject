<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Report</title>
    <link rel="stylesheet" href="{{asset('css/admin/report.css')}}">
</head>

<body>
    <div class="content">
        @if (auth()->user()->role === 'Employee')
        <h1>Access Denied</h1>
        @endif
        @if (auth()->user()->role === 'Admin')
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
                <div class="headercontent">
                    <h2>Rental Report</h2>
                </div>
            </div>
            <hr class="divide" />
            <div class="main">
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
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">Total Rentals: {{ $totalRentals }}</td>
                                <td colspan="2">Total Amount Paid: {{ $totalAmount }}</td>
                                <td>Total Amount Due: {{ $totalDue }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</body>

</html>