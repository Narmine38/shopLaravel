<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = $category->products()
            ->orderBy('price', 'desc')
            ->paginate(10);

        return view('categories.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}
