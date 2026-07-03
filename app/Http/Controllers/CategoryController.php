<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Display all categories (Everyone can view)
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    // Show Create Form (Admin Only)
    public function create()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        return view('categories.create');
    }

    // Store Category (Admin Only)
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name'  => 'required|max:100',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $photoName = null;

        if ($request->hasFile('photo')) {

            $photoName = time().'_'.$request->photo->getClientOriginalName();

            $request->photo->move(
                public_path('images/categories'),
                $photoName
            );
        }

        Category::create([
            'name'  => $request->name,
            'photo' => $photoName
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // Show Edit Form (Admin Only)
    public function edit($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    // Update Category (Admin Only)
    public function update(Request $request, $id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $category = Category::findOrFail($id);

        $request->validate([
            'name'  => 'required|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $photoName = $category->photo;

        if ($request->hasFile('photo')) {

            $photoName = time().'_'.$request->photo->getClientOriginalName();

            $request->photo->move(
                public_path('images/categories'),
                $photoName
            );
        }

        $category->update([
            'name'  => $request->name,
            'photo' => $photoName
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Delete Category (Admin Only)
    public function destroy($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}