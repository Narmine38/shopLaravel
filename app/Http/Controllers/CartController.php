<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $productIds = array_keys($cart);

        $products = $productIds
            ? Product::whereIn('id', $productIds)->get()
            : collect();

        $total = $products->sum(function (Product $product) use ($cart) {
            return $product->price * ($cart[$product->id] ?? 0);
        });

        return view('cart.index', [
            'products' => $products,
            'cart' => $cart,
            'total' => $total,
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + 1;
        $request->session()->put('cart', $cart);

        return back()->with('success', 'Produit ajoute au panier.');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        $cart = $request->session()->get('cart', []);
        $quantity = (int) $data['quantity'];

        if ($quantity <= 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = $quantity;
        }

        $request->session()->put('cart', $cart);

        return back()->with('success', 'Quantite mise a jour.');
    }

    public function remove(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        return back()->with('success', 'Produit retire du panier.');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');

        return back()->with('success', 'Panier vide.');
    }
}
