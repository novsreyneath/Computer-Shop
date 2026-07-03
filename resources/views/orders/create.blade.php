@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">

        <h3>Create Order</h3>

    </div>

    <div class="card-body">

        <form action="{{ route('orders.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label>User ID</label>

                <input type="number"
                       name="user_id"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Total Price</label>

                <input type="number"
                       step="0.01"
                       name="total_price"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>

                </select>

            </div>

            <button class="btn btn-success">

                Save

            </button>

            <a href="{{ route('orders.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection