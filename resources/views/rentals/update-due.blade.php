<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Due</title>
    
</head>
<body>
    <h1>Update Due</h1>
    <form action="{{ route('rentals.update-due.post', $rental->rentalID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="rentalID">Rental ID</label>
            <input type="text" name="rentalID" id="rentalID" value="{{ $rental->rentalID }}" readonly>
        </div>
        <div>
            <label for="Customers_customerID">Customer ID</label>
            <input type="text" name="Customers_customerID" id="Customers_customerID" value="{{ $rental->Customers_customerID }}" readonly>
        </div>
        <div>
            <label for="paid">Pay Amount</label>
            <input type="text" name="paid" id="paid" value="{{ $rental->paid }}" readonly>
        </div>
        <div>
            <label for="amountDue">Amount Due</label>
            <input type="text" name="amountDue" id="amountDue" value="{{ $rental->amountDue }}" readonly>
        </div>
        <div>
            <label for="newPayment">New Payment</label>
            <input type="text" name="newPayment" id="newPayment">
        </div>
        <button type="submit">Update Due</button>
    </form>
</body>
</html>
