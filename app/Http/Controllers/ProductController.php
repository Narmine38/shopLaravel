<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'Liste des produits';
    }

    public function show($id)
    {
        return "Details du produit $id";
    }
}
