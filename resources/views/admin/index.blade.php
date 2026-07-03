    @extends('layouts.app')

    @section('content')

    <div class="container mt-4">

        <h2 class="mb-4">
            🛠 Admin Dashboard
        </h2>

        <div class="row">

            <!-- Products -->
            <div class="col-md-4 mb-4">

                <div class="card bg-primary text-white shadow">

                    <div class="card-body text-center">

                        <h5>Total Products</h5>

                        <h1>{{ $products }}</h1>

                        <a href="{{ route('products.index') }}"
                        class="btn btn-light mt-2">

                            Manage Products

                        </a>

                    </div>

                </div>

            </div>

            <!-- Categories -->
            <div class="col-md-4 mb-4">

                <div class="card bg-success text-white shadow">

                    <div class="card-body text-center">

                        <h5>Total Categories</h5>

                        <h1>{{ $categories }}</h1>

                        <a href="{{ route('categories.index') }}"
                        class="btn btn-light mt-2">

                            Manage Categories

                        </a>

                    </div>

                </div>

            </div>

            <!-- Brands -->
            <div class="col-md-4 mb-4">

                <div class="card bg-warning text-dark shadow">

                    <div class="card-body text-center">

                        <h5>Total Brands</h5>

                        <h1>{{ $brands }}</h1>

                        <a href="{{ route('brands.index') }}"
                        class="btn btn-dark mt-2">

                            Manage Brands

                        </a>

                    </div>

                </div>

            </div>

            <!-- Orders -->
            <div class="col-md-4 mb-4">

                <div class="card bg-info text-white shadow">

                    <div class="card-body text-center">

                        <h5>Total Orders</h5>

                        <h1>{{ $orders }}</h1>

                        <a href="{{ route('orders.index') }}"
                        class="btn btn-light mt-2">

                            Manage Orders

                        </a>

                    </div>

                </div>

            </div>

            <!-- Users -->
            <div class="col-md-4 mb-4">

                <div class="card bg-secondary text-white shadow">

                    <div class="card-body text-center">

                        <h5>Total Users</h5>

                        <h1>{{ $users }}</h1>

                        <a href="#"
                        class="btn btn-light mt-2">

                            Manage Users

                        </a>

                    </div>

                </div>

            </div>

            <!-- Reviews -->
            <div class="col-md-4 mb-4">

                <div class="card bg-danger text-white shadow">

                    <div class="card-body text-center">

                        <h5>Total Reviews</h5>

                        <h1>{{ $reviews }}</h1>

                        <a href="{{ route('reviews.index') }}"
                        class="btn btn-light mt-2">

                            View Reviews

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <hr>

        <h3 class="mb-3">

            Quick Menu

        </h3>

        <div class="row">

            <div class="col-md-3 mb-3">

                <a href="{{ route('products.create') }}"
                class="btn btn-outline-primary w-100">

                    ➕ Add Product

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="{{ route('categories.create') }}"
                class="btn btn-outline-success w-100">

                    ➕ Add Category

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="{{ route('brands.create') }}"
                class="btn btn-outline-warning w-100">

                    ➕ Add Brand

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="{{ route('contacts.index') }}"
                class="btn btn-outline-dark w-100">

                    📩 Contact Messages

                </a>

            </div>

        </div>

    </div>

    @endsection