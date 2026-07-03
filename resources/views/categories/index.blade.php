@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Categories</h2>

    @auth
        @if(Auth::user()->is_admin)

            <a href="{{ route('categories.create') }}"
               class="btn btn-primary">

                Add Category

            </a>

        @endif
    @endauth

</div>

@if(auth()->check() && auth()->user()->is_admin)

<!-- ================= ADMIN TABLE ================= -->

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Action</th>

        </tr>

    </thead>

    <tbody>

    @foreach($categories as $category)

        <tr>

            <td>{{ $category->id }}</td>

            <td>{{ $category->name }}</td>

            <td>

                <img src="{{ asset('images/categories/'.$category->photo) }}"
                     width="100">

            </td>

            <td>

                <a href="{{ route('categories.edit',$category->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('categories.destroy',$category->id) }}"
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

@foreach($categories as $category)

<div class="col-md-3 mb-4">

    <div class="card shadow text-center h-100">

        <img src="{{ asset('images/categories/'.$category->photo) }}"
             class="card-img-top p-3"
             height="180"
             style="object-fit:contain;">

        <div class="card-body">

            <h5>{{ $category->name }}</h5>

        </div>

    </div>

</div>

@endforeach

</div>

@endif

@endsection