<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Online Shopping</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesoeet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-white text-black">


    <!-- Header -->
    <div class="navbar fixed top-0 z-50 bg-gray-300 shadow px-2 md:px-16 py-4 w-full">
        <div class="flex-1">
            <a href="/" class="cursor-pointer text-xl font-bold">
                <img class="w-16 h-auto" src="images/banner-bg.png">
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li> <a href="{{ route('gaming') }}">Gaming</a></li>
                <li> <a href="{{ route('electronics') }}">Electronic</a></li>
                <li> <a href="{{ route('others') }}">Others</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow right-0 w-52">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li> <a href="{{ route('gaming') }}">Gaming</a></li>
                <li> <a href="{{ route('electronics') }}">Electronic</a></li>
                <li> <a href="{{ route('others') }}">Others</a></li>
            </ul>
        </div>
        <div class="flex-none gap-2">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                @php
                $cartLength = session('cart') ? count(session('cart')) : 0;
                @endphp
                <a href="/cart" class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="badge badge-sm indicator-item">{{ $cartLength }}</span>
                </a>
            </div>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component" src="{{ asset('uploads/customers/' . auth()->user()->photo) }}" />
                    </div>
                </div>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-white text-black rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            <a href="/profile">Profile
                            </a>
                    </li>


                    <li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- hero section -->


    <div class="hero min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <img src="images/hero-banner.png" class="max-w-md rounded-lg" />
            <div>
                <h1 class="text-5xl font-bold">
                    <span class="text-purple-800">Get Started!! </span>
                    <br>
                    Your Favourite Shopping
                </h1>

            </div>
        </div>

    </div>

    <div class="px-2 md:px-12 w-full mx-auto">
        <h1 class="text-2xl md:text-4xl font-medium text-center text-gray-800 my-4">Electronics</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 items-center justify-center mx-auto w-full">
            @foreach ($electronicsitems as $item)
            <div class="card w-96 rounded-none shadow-md">
                <figure class="h-[250px]"><img class="h-full object-cover  bg-gray-200" src="{{ asset('uploads/items/'.$item->photo) }}" alt="Shoes" /></figure>
                <div class="card-body">
                    <h2 class="card-title">
                        {{ $item->itemName }}
                    </h2>
                    <p class="text-gray-600">Price: {{ $item->price }} Tk</p>
                    <div class="card-actions justify-end">
                        @if ($item->rentalOrSale == 'Rental')
                        <a href="{{ route('add_to_cart', $item->itemID) }}" class="btn btn-primary btn-sm text-black bg-white border border-primary hover:bg-primary hover:text-white duration-300 font-normal">Add for Rental</a>
                        @endif
                        @if ($item->rentalOrSale == 'Sale')
                        <a href="{{ route('add_to_cart', $item->itemID) }}" class="btn btn-primary btn-sm text-black bg-white border border-primary hover:bg-primary hover:text-white duration-300 font-normal">Add to cart</a>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>




    <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
        <nav>
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                    </svg></a>
            </div>
        </nav>
        <aside>
            <p>Copyright © 2024 - All right reserved</p>
        </aside>
    </footer>


    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>