@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-warning text-dark">

            <h3>Edit Category</h3>

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

            <form action="{{ route('categories.update',$category->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

        

                

                <div class="mb-3">

                    <label class="form-label">

                        Category Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ $category->name }}"
                        required>
<div class="mb-3">

                    <label class="form-label">

                        New Photo

                    </label>

                    <input
                        type="file"
                        name="photo"
                        class="form-control">

                </div>
                </div>
            <div class="mb-3">

                    <label class="form-label">

                        Current Photo

                    </label>

                    <br>

                    @if($category->photo)

                        <img src="{{ asset('images/categories/'.$category->photo) }}"
                             width="150"
                             class="img-thumbnail">

                    @else

                        <p class="text-danger">

                            No Image

                        </p>

                    @endif

                </div>
                <button class="btn btn-primary">

                    Update

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