@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header bg-info text-white">

        <h3>Product Details</h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                @if($product->image)

                    <img src="{{ asset('images/products/'.$product->image) }}"
                         class="img-fluid rounded">

                @else

                    <img src="https://via.placeholder.com/300x300"
                         class="img-fluid rounded">

                @endif

            </div>

            <div class="col-md-8">

                <h2>{{ $product->name }}</h2>

                <hr>

                <p>

                    <strong>Category :</strong>

                    {{ $product->category->name }}

                </p>

                <p>

                    <strong>Brand :</strong>

                    {{ $product->brand->name }}

                </p>

                <p>

                    <strong>Price :</strong>

                    ${{ number_format($product->price,2) }}

                </p>

                <p>

                    <strong>Stock :</strong>

                    {{ $product->stock }}

                </p>

                <p>

                    <strong>Description :</strong>

                </p>

                <p>

                    {{ $product->description }}

                </p>

                <a href="{{ route('products.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>

    </div>

</div>

@endsection