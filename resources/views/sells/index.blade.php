@extends('index')

@section('title', 'Sells')

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
    <div class="headerimg"><img src="icons/sell.png" alt="logo"></div>
    <div class="headercontent">
        <h2>Sell Management</h2>
    </div>
</div>
<hr class="divide" />
<div class="main">
    <div class="add">
        <h4>Add New Purchase: </h4>
        <a href="{{ route('sells.create') }}"><img src="icons/add.png"></a>
    </div>
    <div class="showitem">
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
                    <th>Update Dues</th>
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
                    <td>
                        <a href="{{ route('sells.update-due', $purchase->purchaseID) }}"><img src="icons/update.png"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection