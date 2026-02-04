<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('price', 'desc')->get();

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->only(['category_id', 'name', 'description', 'price', 'stock']);
        $data['slug'] = Str::slug($request->input('name', ''));
        $data['is_active'] = $request->boolean('is_active');

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit cree avec succes.');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->only(['category_id', 'name', 'description', 'price', 'stock']);
        $data['slug'] = Str::slug($request->input('name', ''));
        $data['is_active'] = $request->boolean('is_active');

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit mis a jour avec succes.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit supprime avec succes.');
    }
}
