@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">

        <h2>Order List</h2>

        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            Create Order
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>User ID</th>
                <th>Total Price</th>
                <th>Status</th>
                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

        @foreach($orders as $order)

        <tr>

            <td>{{ $order->id }}</td>

            <td>{{ $order->user_id }}</td>

            <td>${{ number_format($order->total_price,2) }}</td>

            <td>{{ ucfirst($order->status) }}</td>

            <td>

                <a href="{{ route('orders.edit',$order->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('orders.destroy',$order->id) }}"
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

</div>

@endsection