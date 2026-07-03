@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-primary text-white">

            <h3>Add Category</h3>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('categories.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                   

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Category Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter Category Name"
                        required>

                </div>
                    <label class="form-label">

                        Category Photo

                    </label>

                    <input
                        type="file"
                        name="photo"
                        class="form-control">
                <button class="btn btn-success">

                    Save Category

                </button>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection