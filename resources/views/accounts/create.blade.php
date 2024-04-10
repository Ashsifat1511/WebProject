<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Account</title>
    <link rel="stylesheet" href="css/accountadd.css">
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

        <form action="{{ route('accounts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="accountName">Account Name:</label>
                <input type="text" id="accountName" name="accountName">
            </div>
            <div>
                <label for="accountDetails">Account Details:</label>
                <input type="text" id="accountDetails" name="accountDetails">
            </div>
            <div>
                <Label for="Customer_customerID">Customer:</Label>
                <input type="text" id="Customers_customerID" name="Customers_customerID">
            </div>
            <div>
                <label for="User_username">Issued By:</label>
                <input type="text" id="User_username" name="User_username" value="{{ auth()->user()->username }}" readonly>
            </div>
            <div>
                <label for="payMethod">Pay Method:</label>
                <input type="text" id="payMethod" name="payMethod">
            </div>
            <button type="submit">Add</button>
        </form>
    </div>

</body>

</html>