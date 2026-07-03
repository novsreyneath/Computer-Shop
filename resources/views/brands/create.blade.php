@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-primary text-white">

            <h3>Add Brand</h3>

        </div>

        <div class="card-body">

            <form action="{{ route('brands.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Brand Logo</label>

                    <input type="file"
                           name="logo"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Brand Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           required>

                </div>

                <button class="btn btn-success">

                    Save

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