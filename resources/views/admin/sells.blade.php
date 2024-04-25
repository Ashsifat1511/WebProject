<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Report</title>
    <link rel="stylesheet" href="{{asset('css/report.css')}}">
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
                    <h2>Sell Report</h2>
                </div>
            </div>
            <hr class="divide" />
            <div class="main">
                <div class="showitem">
                    <table>
                        <thead>
                            <tr>
                                <th>Purchase ID</th>
                                <th>Purchase Date</th>
                                <th>Quantity</th>
                                <th>Due</th>
                                <th>Username</th>
                                <th>Item Name</th>
                                <th>Customer Name</th>
                                <th>Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentPurchases as $purchase)
                            <tr>
                                <td>{{ $purchase->purchaseID }}</td>
                                <td>{{ $purchase->purchaseDate }}</td>
                                <td>{{ $purchase->purchaseQuantity }}</td>
                                <td>{{ $purchase->amountDue }}</td>
                                <td>{{ $purchase->User_username }}</td>
                                <td>{{ $purchase->item->itemName }}</td>
                                <td>{{ $purchase->customer->first_name }}</td>
                                <td>{{ $purchase->payAmount }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Total Sells: {{ $totalSells }}</td>
                                <td colspan="3">Total Amount: {{ $totalAmount }}</td>
                                <td>Total Due: {{ $totalDue }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('sales.export') }}" class="btn btn-primary">Download</a>
            </div>
        </div>
        @endif
    </div>
</body>

</html>