<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Accounts</title>
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
</head>
<body>
    <a href="{{ route('accounts.index') }}">Back to Account</a>
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
                        <td>{{ $account->accountID }}</td>
                        <td>{{ $account->accountName }}</td>
                        <td>{{ $account->accountDetails }}</td>
                        <td>{{ $account->customer->first_name }}</td>
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
