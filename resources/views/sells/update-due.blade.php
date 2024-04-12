<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Due</title>
    
</head>
<body>
    <h1>Update Due</h1>

    <form action="{{ route('sells.update-due.post', $purchase->purchaseID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="purchaseID">Purchase ID</label>
            <input type="text" name="purchaseID" id="purchaseID" value="{{ $purchase->purchaseID }}" readonly>
        </div>
        <div>
            <label for="Customers_customerID">Customer ID</label>
            <input type="text" name="Customers_customerID" id="Customers_customerID" value="{{ $purchase->Customers_customerID }}" readonly>
        </div>
        <div>
            <Label for="payAmount">Pay Amount</Label>
            <input type="text" name="payAmount" id="payAmount" value="{{ $purchase->payAmount }}" readonly>
        </div>
        <div>
            <label for="amountDue">Amount Due</label>
            <input type="text" name="amountDue" id="amountDue" value="{{ $purchase->amountDue }}" readonly>
        </div>
        <div>
            <label for="newPayment">New Payment</label>
            <input type="text" name="newPayment" id="newPayment">
        </div>
        <button type="submit">Update Due</button>
    </form>
</body>
</html>
