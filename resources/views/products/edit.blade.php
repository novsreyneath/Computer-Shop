@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header bg-warning text-dark">
        <h3>Edit Product</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('products.update',$product->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Category</label>

                <select name="category_id" class="form-control">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $category->id == $product->category_id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Brand</label>

                <select name="brand_id" class="form-control">

                    @foreach($brands as $brand)

                        <option value="{{ $brand->id }}"
                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>

                            {{ $brand->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Product Name</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $product->name }}">

            </div>

            <div class="mb-3">

                <label>Price</label>

                <input type="number"
                       step="0.01"
                       name="price"
                       class="form-control"
                       value="{{ $product->price }}">

            </div>

            <div class="mb-3">

                <label>Stock</label>

                <input type="number"
                       name="stock"
                       class="form-control"
                       value="{{ $product->stock }}">

            </div>

            <div class="mb-3">

                <label>Current Image</label>

                <br>

                @if($product->image)

                    <img src="{{ asset('images/products/'.$product->image) }}"
                         width="150">

                @else

                    No Image

                @endif

            </div>

            <div class="mb-3">

                <label>New Image</label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Description</label>

                <textarea name="description"
                          rows="5"
                          class="form-control">{{ $product->description }}</textarea>

            </div>

            <button class="btn btn-primary">

                Update Product

            </button>

            <a href="{{ route('products.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection