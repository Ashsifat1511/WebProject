<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Accounts</title>
    <link rel="stylesheet" href="css/accountsearch.css">
</head>
<body>
    <h1>Search Accounts</h1>

    <form action="{{ route('accounts.search') }}" method="GET">
        <div>
            <label for="query">Search by name, address, phone, or email:</label>
            <input type="text" id="query" name="query" value="{{ request()->input('query') }}">
        </div>
        <button type="submit">Search</button>
    </form>

    @if($accounts->count() > 0)
        <h2>Search Results:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Account Name</th>
                    <th>Account Details</th>
                    <th>Customer</th>
                    <th>Issued By</th>
                    <th>Pay Method</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->accountName }}</td>
                        <td>{{ $account->accountDetails }}</td>
                        <td>{{ $account->Customers_customerID }}</td>
                        <td>{{ $account->User_username }}</td>
                        <td>{{ $account->payMethod }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No customers found.</p>
    @endif
</body>
</html>
