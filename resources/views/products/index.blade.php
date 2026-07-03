@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">

        <h2>Products</h2>

        @auth
            @if(Auth::user()->is_admin)

                <a href="{{ route('products.create') }}"
                   class="btn btn-success">

                    Add Product

                </a>

            @endif
        @endauth

    </div>

@if(auth()->check() && auth()->user()->is_admin)

<!-- ================= ADMIN TABLE ================= -->

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th width="220">Action</th>

        </tr>

    </thead>

    <tbody>

    @foreach($products as $product)

        <tr>

            <td>{{ $product->id }}</td>

            <td>

                <img src="{{ asset('images/products/'.$product->image) }}"
                     width="80">

            </td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->category->name }}</td>

            <td>{{ $product->brand->name }}</td>

            <td>${{ number_format($product->price,2) }}</td>

            <td>{{ $product->stock }}</td>

            <td>

                <a href="{{ route('products.show',$product->id) }}"
                   class="btn btn-info btn-sm">

                    View

                </a>

                <a href="{{ route('products.edit',$product->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('products.destroy',$product->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@else

<!-- ================= CUSTOMER VIEW ================= -->

<div class="row">

@foreach($products as $product)

<div class="col-lg-3 col-md-4 mb-4">

    <div class="card shadow h-100">

        <img src="{{ asset('images/products/'.$product->image) }}"
             height="220"
             class="card-img-top"
             style="object-fit:contain;">

        <div class="card-body">

            <h5>{{ $product->name }}</h5>

            <p>
                <strong>Category:</strong>
                {{ $product->category->name }}
            </p>

            <p>
                <strong>Brand:</strong>
                {{ $product->brand->name }}
            </p>

            <h5 class="text-danger">

                ${{ number_format($product->price,2) }}

            </h5>

            <a href="{{ route('products.show',$product->id) }}"
               class="btn btn-primary w-100">

                View Details

            </a>

        </div>

    </div>

</div>

@endforeach

</div>

@endif

</div>

@endsection