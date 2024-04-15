<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @yield('additional-css')
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <div class="menu">
            @include('menu')
        </div>
        <div>
            <h3>Current time:</h3>
            <div id="clock" class="clock"></div>
        </div>
        <div class="current-user">
            <ul>
                <li>Logged in as: {{ auth()->user()->name }}</li>
                <li>Role: {{ auth()->user()->role }}</li>
            </ul>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/clock.js') }}"></script>
</body>
</html>
