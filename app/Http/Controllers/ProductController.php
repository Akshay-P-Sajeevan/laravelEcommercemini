<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    // ... existing methods ...

    public function create()
    {
        return view('admin.create_product');
    }

    public function edit(Product $product)
    {
        return view('admin.edit_product', compact('product'));
    }

    // Add the store and update methods if not already present
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Product::create($validated);
        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product->update($validated);
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('is_deleted', false)
                        ->where('name', 'like', "%{$search}%")
                        ->paginate(10);
        return view('admin.products', compact('products', 'search'));
    }

    public function index()
    {
        $products = Product::where('is_deleted', false)->paginate(10);
        return view('admin.products', compact('products'));
    }
}
