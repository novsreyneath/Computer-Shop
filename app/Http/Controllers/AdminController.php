<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!Auth::user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $products = Product::count();
        $categories = Category::count();
        $brands = Brand::count();
        $orders = Order::count();
        $users = User::count();
        $reviews = Review::count();

        return view('admin.index', compact(
            'products',
            'categories',
            'brands',
            'orders',
            'users',
            'reviews'
        ));
    }
}