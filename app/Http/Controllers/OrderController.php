<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    // Display Orders
    public function index()
    {
        $orders = Order::with('items')->orderBy('id', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    // Show Create Form
    public function create()
    {
        return view('orders.create');
    }

    // Store Order
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'total_price' => 'required|numeric',
            'status' => 'required'
        ]);

        Order::create([
            'user_id' => $request->user_id,
            'total_price' => $request->total_price,
            'status' => $request->status
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    // Edit Order
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.edit', compact('order'));
    }

    // Update Order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'total_price' => 'required|numeric',
            'status' => 'required'
        ]);

        $order->update([
            'total_price' => $request->total_price,
            'status' => $request->status
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    // Delete Order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}