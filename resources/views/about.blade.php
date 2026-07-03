@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">About Computer Shop</h1>

        <p class="text-muted">
            Your trusted destination for computers, laptops, gaming accessories, and technology products.
        </p>

    </div>

    <div class="row align-items-center">

        <div class="col-md-6">

            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=800"
                 class="img-fluid rounded shadow"
                 alt="Computer Shop">

        </div>

        <div class="col-md-6">

            <h2>Who We Are</h2>

            <p>
                Computer Shop is committed to providing high-quality computers,
                laptops, gaming equipment, and accessories at competitive prices.
                Our goal is to deliver excellent customer service and reliable
                technology solutions for students, professionals, and gamers.
            </p>

            <p>
                We carefully select products from trusted brands such as ASUS,
                MSI, Acer, Logitech, Corsair, and many more to ensure our
                customers receive the best quality.
            </p>

        </div>

    </div>

    <hr class="my-5">

    <div class="row text-center">

        <div class="col-md-4">

            <div class="card shadow-sm p-4 h-100">

                <i class="fas fa-laptop fa-3x text-primary mb-3"></i>

                <h4>Quality Products</h4>

                <p>
                    We offer genuine products from trusted international brands.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm p-4 h-100">

                <i class="fas fa-headset fa-3x text-success mb-3"></i>

                <h4>Customer Support</h4>

                <p>
                    Our support team is always ready to help before and after your purchase.
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm p-4 h-100">

                <i class="fas fa-truck fa-3x text-danger mb-3"></i>

                <h4>Fast Delivery</h4>

                <p>
                    We deliver products safely and quickly to our customers.
                </p>

            </div>

        </div>

    </div>

    <hr class="my-5">

    <div class="text-center">

        <h2>Our Mission</h2>

        <p class="lead">
            To become the most trusted computer shop by providing quality products,
            excellent customer service, and the latest technology at affordable prices.
        </p>

    </div>

</div>

@endsection