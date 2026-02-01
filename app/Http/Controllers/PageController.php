<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        $productUrl = route('products.show', ['id' => 5]);

        return "Bienvenue sur ShopLaravel ! Produit exemple : $productUrl";
    }

    public function about()
    {
        return 'A propos de la boutique ShopLaravel.';
    }

    public function contact()
    {
        return 'Contactez-nous';
    }
}
