<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="{{asset('css/customer/customertable.css')}}">
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
            <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $customer->first_name }}">
                </div>
                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $customer->last_name }}">
                </div>
                <div>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{ $customer->address }}">
                </div>
                <div>
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="{{ $customer->phone }}">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $customer->email }}">
                </div>
                <div>
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <div>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="Male" {{ $customer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $customer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <button type="submit">Update Customer</button>
            </form>
        </div>
    </div>
</body>

</html>