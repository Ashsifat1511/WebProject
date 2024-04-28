@extends('index')

@section('title', 'Accounts')

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
    <div class="headerimg"><img src="icons/Accounts_main.png" alt="logo"></div>
    <div class="headercontent">
        <h2>Account Management</h2>
    </div>
</div>
<hr class="divide" />
<div class="main">
    <div class="search">
        <form action="{{ route('accounts.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search by name...">
            <button type="submit"><img src="icons/search.png"></button>
        </form>
    </div>
    <div class="add">
        <h4>Add New Account: </h4>
        <a href="{{ route('accounts.create') }}"><img src="icons/add.png"></a>
    </div>
    <div class="showitem">
        <table>
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th>Account Name</th>
                    <th>Account Details</th>
                    <th>Customer</th>
                    <th> Issued By</th>
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
    </div>
</div>
@endsection