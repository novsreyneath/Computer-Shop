@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-warning">

            <h3>Edit Brand</h3>

        </div>

        <div class="card-body">

            <form action="{{ route('brands.update',$brand->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Current Logo</label>

                    <br>

                    @if($brand->logo)

                        <img src="{{ asset('images/brands/'.$brand->logo) }}"
                             width="120">

                    @else

                        No Logo

                    @endif

                </div>

                <div class="mb-3">

                    <label>New Logo</label>

                    <input type="file"
                           name="logo"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Brand Name</label>

                    <input type="text"
                           name="name"
                           value="{{ $brand->name }}"
                           class="form-control">

                </div>

                <button class="btn btn-primary">

                    Update

                </button>

                <a href="{{ route('brands.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection