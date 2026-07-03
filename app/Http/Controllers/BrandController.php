<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // Display all brands (Everyone)
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();

        return view('brands.index', compact('brands'));
    }

    // Show Create Form (Admin Only)
    public function create()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        return view('brands.create');
    }

    // Store Brand (Admin Only)
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|max:100|unique:brands,name',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $logoName = null;

        if ($request->hasFile('logo')) {

            $logoName = time().'_'.$request->logo->getClientOriginalName();

            $request->logo->move(
                public_path('images/brands'),
                $logoName
            );
        }

        Brand::create([
            'name' => $request->name,
            'logo' => $logoName
        ]);

        return redirect()
                ->route('brands.index')
                ->with('success', 'Brand added successfully.');
    }

    // Show Edit Form (Admin Only)
    public function edit($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $brand = Brand::findOrFail($id);

        return view('brands.edit', compact('brand'));
    }

    // Update Brand (Admin Only)
    public function update(Request $request, $id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100|unique:brands,name,'.$id,
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $logoName = $brand->logo;

        if ($request->hasFile('logo')) {

            $logoName = time().'_'.$request->logo->getClientOriginalName();

            $request->logo->move(
                public_path('images/brands'),
                $logoName
            );
        }

        $brand->update([
            'name' => $request->name,
            'logo' => $logoName
        ]);

        return redirect()
                ->route('brands.index')
                ->with('success', 'Brand updated successfully.');
    }

    // Delete Brand (Admin Only)
    public function destroy($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $brand = Brand::findOrFail($id);

        if ($brand->logo && file_exists(public_path('images/brands/'.$brand->logo))) {
            unlink(public_path('images/brands/'.$brand->logo));
        }

        $brand->delete();

        return redirect()
                ->route('brands.index')
                ->with('success', 'Brand deleted successfully.');
    }
}