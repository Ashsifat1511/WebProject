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
    <div class="showitem">
        <table>
            <thead>
                <tr>
                    <th>Purchase ID</th>
                    <th>Purchase Date</th>
                    <th>Quantity</th>
                    <th>Item Name</th>
                    <th>Customer Name</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentPurchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->purchaseDate }}</td>
                    <td>{{ $purchase->purchaseQuantity }}</td>
                    <td>{{ $purchase->item->itemName }}</td>
                    <td>{{ $purchase->customer->first_name }}</td>
                    <td>{{ $purchase->payAmount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection