<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Rental</title>
    <link rel="stylesheet" href="{{asset('css/rental/rentaltable.css')}}">
</head>

<body>
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
        <div class="item">
            <form action="{{ route('rentals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="rentalDate">Rental Date:</label>
                    <input type="date" id="rentalDate" name="rentalDate">
                </div>
                <div>
                    <label for="returnDate">Return Date:</label>
                    <input type="date" id="returnDate" name="returnDate">
                </div>
                <div>
                    <label for="quantity">Quantity:</label>
                    <input type="text" id="quantity" name="quantity">
                </div>
                <div>
                    <label for="paid">Paid:</label>
                    <input type="text" id="paid" name="paid">
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
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

</body>

</html>