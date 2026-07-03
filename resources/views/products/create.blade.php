@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Add Product</h3>

</div>

<div class="card-body">

<form action="{{ route('products.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label>Category</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Brand</label>

<select name="brand_id" class="form-control">

@foreach($brands as $brand)

<option value="{{ $brand->id }}">

{{ $brand->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Product Name</label>

<input type="text"
       name="name"
       class="form-control">

</div>

<div class="mb-3">

<label>Price</label>

<input type="number"
       step="0.01"
       name="price"
       class="form-control">

</div>

<div class="mb-3">

<label>Stock</label>

<input type="number"
       name="stock"
       class="form-control">

</div>

<div class="mb-3">

<label>Image</label>

<input type="file"
       name="image"
       class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea name="description"
          class="form-control"
          rows="5"></textarea>

</div>

<button class="btn btn-success">

Save Product

</button>

<a href="{{ route('products.index') }}"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

@endsection