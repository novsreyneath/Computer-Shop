<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display Cart
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            $cartItems = collect();
        } else {
            $cartItems = CartItem::with('product')
                            ->where('cart_id', $cart->id)
                            ->get();
        }

        return view('carts.index', compact('cartItems'));
    }

    // Add Product To Cart
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $item = CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $request->product_id)
                    ->first();

        if ($item) {

            $item->quantity += 1;
            $item->save();

        } else {

            CartItem::create([

                'cart_id' => $cart->id,

                'product_id' => $request->product_id,

                'quantity' => 1

            ]);

        }

        return redirect()->back()
                ->with('success', 'Product added to cart.');
    }

    // Update Quantity
    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);

        $cartItem->update([

            'quantity' => $request->quantity

        ]);

        return redirect()->route('carts.index');
    }

    // Remove Product
    public function destroy($id)
    {
        CartItem::findOrFail($id)->delete();

        return redirect()->route('carts.index')
            ->with('success','Product removed.');
    }
}