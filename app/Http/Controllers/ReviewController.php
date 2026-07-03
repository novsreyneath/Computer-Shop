<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;

class ReviewController extends Controller
{
    // Display Reviews
    public function index()
    {
        $reviews = Review::with('product','user')
                    ->orderBy('id','desc')
                    ->get();

        return view('reviews.index', compact('reviews'));
    }

    // Store Review
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        Review::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->back()
            ->with('success','Review submitted successfully.');
    }

    // Delete Review
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return redirect()->route('reviews.index')
            ->with('success','Review deleted successfully.');
    }
}