<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container mt-5">
        <!-- Profile Header -->
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="profile-image">
                    <img src="{{ asset('uploads/customers/' . auth()->user()->photo) }}" alt="User Image" class="img-fluid">
                </div>
            </div>
            <div class="col-md-8">
                <p>First Name:{{auth()->user()->customer->first_name}}</p>
                <p>Last Name:{{auth()->user()->customer->last_name}}</p>
                <p>Username:{{auth()->user()->username}}</p>
                <p>Email:{{auth()->user()->email}}</p>
                <p>Gender:{{auth()->user()->customer->gender}}</p>
                <p>Phone:{{auth()->user()->customer->phone}}</p>
                <p>Last Updated:{{auth()->user()->updated_at}}</p>
            </div>
        </div>

        <!-- Tabs for different sections -->
        <ul class="nav nav-tabs mt-3" id="ProfileTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="true">Orders</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Update Profile</button>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="ProfileTabContent">
            <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <!-- Orders content goes here -->
                <p>Your recent orders</p>
                <!-- Example table for orders -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Type</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sells as $sell)
                        <tr>
                            <td>{{ $sell->purchaseDate }}</td>
                            <td>{{ $sell->item->itemName }}</td>
                            <td>{{ $sell->purchaseQuantity }}</td>
                            <td>Purchased</td>
                            <td>{{ $sell->payAmount }}</td>
                            <td>Delivered</td>
                        </tr>
                        @endforeach
                        @foreach($rentals as $rental)
                        <tr>
                            <td>{{ $rental->rentalDate }}</td>
                            <td>{{ $rental->item->itemName }}</td>
                            <td>{{ $rental->quantity }}</td>
                            <td>Took Rent</td>
                            <td>{{ $rental->paid }}</td>
                            <td>
                                @if ($rental->isReturned)
                                Returned
                                @else
                                Not Returned
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <!-- Settings content goes here -->
                <p>Account settings</p>
                <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{auth()->user()->customer->first_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{auth()->user()->customer->last_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{auth()->user()->username}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{auth()->user()->customer->phone}}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{auth()->user()->customer->address}}">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>