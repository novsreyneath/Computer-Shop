@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Shopping Cart
    </h2>

    @if($cartItems->count())

    <table class="table table-bordered">

        <thead class="table-dark">

            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

        @php
            $grandTotal = 0;
        @endphp

        @foreach($cartItems as $item)

        @php
            $total = $item->product->price * $item->quantity;
            $grandTotal += $total;
        @endphp

        <tr>

            <td width="120">

                @if($item->product->image)

                    <img src="{{ asset('images/products/'.$item->product->image) }}"
                         width="100">

                @else

                    No Image

                @endif

            </td>

            <td>

                {{ $item->product->name }}

            </td>

            <td>

                ${{ number_format($item->product->price,2) }}

            </td>

            <td>

                <form action="{{ route('carts.update',$item->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <input type="number"
                           name="quantity"
                           value="{{ $item->quantity }}"
                           min="1"
                           class="form-control">

                    <br>

                    <button class="btn btn-primary btn-sm">

                        Update

                    </button>

                </form>

            </td>

            <td>

                ${{ number_format($total,2) }}

            </td>

            <td>

                <form action="{{ route('carts.destroy',$item->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">

                        Remove

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    <div class="text-end mt-3">

        <h3>

            Grand Total :

            <span class="text-danger">

                ${{ number_format($grandTotal,2) }}

            </span>

        </h3>

    </div>

    <div class="mt-3">

        <a href="{{ route('orders.create') }}"
           class="btn btn-success">

            Proceed To Checkout

        </a>

    </div>

    @else

    <div class="alert alert-warning">

        Your Cart is Empty.

    </div>

    @endif

</div>

@endsection