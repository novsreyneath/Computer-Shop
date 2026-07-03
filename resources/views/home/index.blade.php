@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">

    <!-- Hero Banner -->
    <div class="bg-primary text-white py-5">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h1 class="display-4 fw-bold">
                        BUILD YOUR DREAM PC
                    </h1>

                    <p class="lead">
                        High Performance Computers, Laptops and Gaming Accessories
                    </p>

                    <a>
                        Shop Now
                    </a>

                </div>

                <div class="col-md-6 text-center">

                    <img src="{{ asset('https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-taobao-vector-creative-technology-online-shopping-illustration-computer-finger-poster-image_131803.jpg') }}"
                         class="img-fluid"
                         alt="Banner">

                </div>

            </div>

        </div>
    </div>

    <!-- Categories -->
    <div class="container mt-5">

        <h2 class="mb-4">
            Shop By Categories
        </h2>

        <div class="row">

            @foreach($categories as $category)

                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">

                    <div class="card shadow-sm h-100 text-center">

                        @if($category->photo)

    <img src="{{ asset('images/categories/'.$category->photo) }}"
         class="card-img-top p-3"
         height="130"
         style="object-fit: contain;">

@else

    <img src="{{ asset('images/categories/.$category->image') }}"
         class="card-img-top p-3"
         height="130"
         style="object-fit: contain;">

@endif
                        <div class="card-body">

                            <h6>{{ $category->name }}</h6>
                            

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

    <!-- Latest Products -->

    <div class="container mt-5">

        <h2 class="mb-4">
            Featured Products
        </h2>

        <div class="row">

            @foreach($products as $product)

            <div class="col-lg-3 col-md-4 mb-4">

                <div class="card shadow h-100">

                    <img src="{{ asset('images/products/'.$product->image) }}"
                         height="220"
                         class="card-img-top">

                    <div class="card-body">

                        <h5>{{ $product->name }}</h5>

                        <p class="text-danger fw-bold">

                            ${{ number_format($product->price,2) }}

                        </p>

                        <form action="{{ route('carts.store') }}" method="POST">

    @csrf

    <input type="hidden"
           name="product_id"
           value="{{ $product->id }}">

    <button type="submit"
            class="btn btn-warning w-100">

        <i class="fa fa-shopping-cart"></i>

        Add To Cart

    </button>

</form>

<br>

<a href="{{ route('products.show',$product->id) }}"
   class="btn btn-primary w-100">

    View Details

</a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection