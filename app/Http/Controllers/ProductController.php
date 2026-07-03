<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    // Display Products
    public function index()
    {
        $products = Product::with('category','brand')
                    ->orderBy('id','desc')
                    ->get();

        return view('products.index', compact('products'));
    }

    // Show Create Form (Admin Only)
    public function create()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        $categories = Category::all();
        $brands = Brand::all();

        return view('products.create', compact('categories','brands'));
    }

    // Store Product (Admin Only)
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'category_id'=>'required',
            'brand_id'=>'required',
            'name'=>'required|max:150',
            'price'=>'required|numeric',
            'stock'=>'required|integer',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'=>'nullable'
        ]);

        $imageName = null;

        if($request->hasFile('image')){

            $imageName = time().'_'.$request->image->getClientOriginalName();

            $request->image->move(public_path('images/products'),$imageName);
        }

        Product::create([
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'image'=>$imageName,
            'description'=>$request->description
        ]);

        return redirect()->route('products.index')
            ->with('success','Product added successfully.');
    }

    // Product Details
    public function show($id)
    {
        $product = Product::with('category','brand','reviews')
                    ->findOrFail($id);

        return view('products.show', compact('product'));
    }

    // Edit Product (Admin Only)
    public function edit($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.edit', compact('product','categories','brands'));
    }

    // Update Product (Admin Only)
    public function update(Request $request,$id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        $product = Product::findOrFail($id);

        $request->validate([
            'category_id'=>'required',
            'brand_id'=>'required',
            'name'=>'required|max:150',
            'price'=>'required|numeric',
            'stock'=>'required|integer',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'=>'nullable'
        ]);

        $imageName = $product->image;

        if($request->hasFile('image')){

            $imageName = time().'_'.$request->image->getClientOriginalName();

            $request->image->move(public_path('images/products'),$imageName);
        }

        $product->update([
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'image'=>$imageName,
            'description'=>$request->description
        ]);

        return redirect()->route('products.index')
            ->with('success','Product updated successfully.');
    }

    // Delete Product (Admin Only)
    public function destroy($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully.');
    }
}