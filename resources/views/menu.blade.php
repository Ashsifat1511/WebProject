<ul>
    <li><a href="/dashboard">Dashboard</a></li>
    <li><a href="/items">Items</a></li>
    <li><a href="/customers">Customers</a></li>
    <li><a href="/sells">Sells</a></li>
    <li><a href="/rentals">Rentals</a></li>
    @if (auth()->user()->role === 'Admin')
    <li><a href="/admin">Administrative</a></li>
    @endif
    <li>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </li>
</ul>
