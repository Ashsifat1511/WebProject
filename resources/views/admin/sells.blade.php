<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Report</title>
    <link rel="stylesheet" href="css/adminroute.css">
</head>

<body>
    <div class="content">
        @if (auth()->user()->role === 'Employee')
        <h1>Access Denied</h1>
        @endif
        @if (auth()->user()->role === 'Admin')
        <h1>Sells Report</h1>

        <table>
            <thead>
                <tr>
                    <th>Purchase ID</th>
                    <th>Purchase Date</th>
                    <th>Quantity</th>
                    <th>Due</th>
                    <th>Username</th>
                    <th>Item ID</th>
                    <th>Customer ID</th>
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
                    <td>{{ $purchase->Item_itemID }}</td>
                    <td>{{ $purchase->Customers_customerID }}</td>
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
        @endif
    </div>
    <script src="js/clock.js"></script>
</body>

</html>