<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="css/adminroute.css">
</head>

<body>
    <div>
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="content">
        @if(auth()->user()->role === 'Employee')
        <h1>Access Denied</h1>
        @endif
        @if(auth()->user()->role === 'Admin')
        <h1>Employee List</h1>

        <table>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->username }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->role }}</td>
                    <td>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <script src="js/clock.js"></script>
</body>

</html>