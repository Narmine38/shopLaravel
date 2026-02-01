<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        $shop = [
            'name' => 'ShopLaravel',
            'product_count' => 120,
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
