@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">

        <h2>Brands</h2>

        @auth
            @if(Auth::user()->is_admin)

                <a href="{{ route('brands.create') }}"
                   class="btn btn-primary">

                    Add Brand

                </a>

            @endif
        @endauth

    </div>

@if(auth()->check() && auth()->user()->is_admin)

<!-- ================= ADMIN VIEW ================= -->

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody>

    @foreach($brands as $brand)

        <tr>

            <td>{{ $brand->id }}</td>

            <td>

                @if($brand->logo)

                    <img src="{{ asset('images/brands/'.$brand->logo) }}"
                         width="80"
                         height="80"
                         class="img-thumbnail">

                @else

                    No Logo

                @endif

            </td>

            <td>{{ $brand->name }}</td>

            <td>

                <a href="{{ route('brands.edit',$brand->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('brands.destroy',$brand->id) }}"
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

@foreach($brands as $brand)

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

    <div class="card shadow text-center h-100">

        @if($brand->logo)

            <img src="{{ asset('images/brands/'.$brand->logo) }}"
                 class="card-img-top p-3"
                 height="180"
                 style="object-fit:contain;">

        @endif

        <div class="card-body">

            <h5>{{ $brand->name }}</h5>

        </div>

    </div>

</div>

@endforeach

</div>

@endif

</div>

@endsection