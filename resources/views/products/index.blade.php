@extends('layouts.app')

@section('title', 'Produits')

@section('content')
    <h1>Liste des produits</h1>

    <ul>
        @forelse ($products as $product)
            <li>
                {{ $product['id'] }} - {{ $product['name'] }} : {{ number_format($product['price'], 2, '.', ' ') }} €
            </li>
        @empty
            <li>Aucun produit pour le moment.</li>
        @endforelse
    </ul>
@endsection
