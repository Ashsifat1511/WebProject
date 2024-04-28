<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="{{asset('css/list.css')}}">
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
            <div class="header">
                <div class="headercontent">
                    <h2>List of Employee</h2>
                </div>
            </div>
            <hr class="divide" />
            <div class="main">
                <div class="showitem">
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
                                    @if((auth()->user()->role === 'Admin' && auth()->user()->id==$employee->id)||$employee->role === 'Employee')
                                    <a href="{{ route('employees.edit', $employee->id) }}"><img src="{{asset('icons/edit.png')}}"></a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                    </form>
                                    @endif
                                    @if($employee->role === 'Admin' && auth()->user()->id!=$employee->id)
                                    Can't Edit or Delete
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</body>

</html>