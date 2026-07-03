@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Customer Reviews</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>User ID</th>
                <th>Product</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

        @foreach($reviews as $review)

        <tr>

            <td>{{ $review->id }}</td>

            <td>{{ $review->user_id }}</td>

            <td>{{ $review->product->name }}</td>

            <td>{{ $review->rating }}/5</td>

            <td>{{ $review->comment }}</td>

            <td>

                <form action="{{ route('reviews.destroy',$review->id) }}"
                      method="POST">

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

</div>

@endsection