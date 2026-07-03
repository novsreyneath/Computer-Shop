@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3>Edit Order</h3>

    </div>

    <div class="card-body">

        <form action="{{ route('orders.update',$order->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Total Price</label>

                <input type="number"
                       step="0.01"
                       name="total_price"
                       class="form-control"
                       value="{{ $order->total_price }}">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>

                    <option value="processing" {{ $order->status=='processing'?'selected':'' }}>Processing</option>

                    <option value="completed" {{ $order->status=='completed'?'selected':'' }}>Completed</option>

                    <option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>Cancelled</option>

                </select>

            </div>

            <button class="btn btn-primary">

                Update

            </button>

            <a href="{{ route('orders.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection