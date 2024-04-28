<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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
            @if(auth()->user()->role === 'Employee')
            <h1>Access Denied</h1>
            @endif
            @if(auth()->user()->role === 'Admin')
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $employee->name }}">
                </div>
                <div>
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" name="username" value="{{ $employee->username }}">
                </div>
                <div>
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $employee->email }}">
                </div>
                <div>
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div>
                    <label for="role">Role:</label>
                    <select name="role" id="role">
                        <option value="Admin" {{ $employee->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Employee" {{ $employee->role === 'Employee' ? 'selected' : '' }}>Employee</option>
                    </select>
                </div>
                <button type="submit">Update Data</button>
            </form>
            @endif
        </div>
    </div>
</body>

</html>