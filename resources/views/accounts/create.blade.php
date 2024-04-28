<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Account</title>
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
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
                <label for="Customers_customerID">Customer:</label>
                    <select name="Customers_customerID" id="Customers_customerID">
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="User_username">Issued By:</label>
                    <input type="text" id="User_username" name="User_username" value="{{ auth()->user()->username }}" readonly>
                </div>
                <div>
                    <label for="payMethod">Pay Method:</label>
                    <select name="payMethod" id="payMethod">
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                </div>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
</body>

</html>