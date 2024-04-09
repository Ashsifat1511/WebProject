<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Purchase</title>
    <link rel="stylesheet" href="css/itemadd.css">
</head>

<body>
<div class="side"></div>
<div class="header"></div>    
<div class="content">
    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
        <h1>Add New Purchase</h1>

        <form action="{{ route('sells.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="purchaseDate">Purchase Date:</label>
                <input type="date" id="purchaseDate" name="purchaseDate">
            </div>
            <div>
                <label for="purchaseQuantity">Purchase Quantity:</label>
                <input type="text" id="purchaseQuantity" name="purchaseQuantity">
            </div>
            <div>
                <label for="User_username">Issued By:</label>
                <input type="text" id="User_username" name="User_username" value="{{ auth()->user()->username }}" readonly>
            </div>
            <div>
                <label for="Item_itemID">Item:</label>
                <input type="text" id="Item_itemID" name="Item_itemID">
            </div>
            <div>
                <label for="Customers_customerID">Customer:</label>
                <input type="text" id="Customers_customerID" name="Customers_customerID">
            </div>
            <div>
                <label for="payAmount">Pay Amount:</label>
                <input type="text" id="payAmount" name="payAmount">
            </div>
            <button type="submit">Add</button>
        </form>
    </div>

</body>

</html>