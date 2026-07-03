<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Computer Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">

            💻 Computer Shop

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">
            <ul class="navbar-nav ms-auto">

@guest

<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('about') }}">About</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('brands.index') }}">Brands</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('contacts.index') }}">Contact</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">Register</a>
</li>

@else

@if(Auth::user()->is_admin)

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('about') }}">About</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('brands.index') }}">Brands</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a>
</li>

@else

<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('about') }}">About</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('brands.index') }}">Brands</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('carts.index') }}">Cart</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('contacts.index') }}">Contact</a>
</li>

@endif

<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle"
       href="#"
       role="button"
       data-bs-toggle="dropdown">

        {{ Auth::user()->name }}

    </a>

    <ul class="dropdown-menu dropdown-menu-end">

        @if(!Auth::user()->is_admin)

        <li>
            <a class="dropdown-item"
               href="{{ route('orders.index') }}">
                My Orders
            </a>
        </li>

        @endif

        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item">
                    Logout
                </button>
            </form>
        </li>

    </ul>

</li>

@endguest

</ul>

        </div>

    </div>

</nav>

<div class="container mt-4">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

<footer class="bg-dark text-white text-center mt-5 p-3">

    <h5>Computer Shop</h5>

    <p>© {{ date('Y') }} All Rights Reserved.</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>