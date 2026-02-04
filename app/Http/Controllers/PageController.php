<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $shop = [
            'name' => 'ShopLaravel',
            'product_count' => Product::count(),
            'is_open' => true,
        ];

        return view('home', ['shop' => $shop]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
