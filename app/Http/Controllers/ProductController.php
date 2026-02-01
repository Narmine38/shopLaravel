<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'T-shirt coton', 'price' => 19.90],
            ['id' => 2, 'name' => 'Casquette urbaine', 'price' => 14.50],
            ['id' => 3, 'name' => 'Sac week-end', 'price' => 49.00],
            ['id' => 4, 'name' => 'Mug ceramique', 'price' => 9.90],
            ['id' => 5, 'name' => 'Carnet kraft', 'price' => 6.80],
        ];

        return view('products.index', ['products' => $products]);
    }

    public function show($id)
    {
        return "Details du produit $id";
    }
}
