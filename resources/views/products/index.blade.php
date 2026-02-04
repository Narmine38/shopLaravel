@extends('layouts.app')

@section('title', 'Produits')

@section('content')
    <h1>Liste des produits</h1>

    <ul>
        @forelse ($products as $product)
            <li>
                <a href="{{ route('products.show', ['id' => $product->id]) }}">
                    {{ $product->id }} - {{ $product->name }}
                </a>
                : {{ number_format($product->price, 2, '.', ' ') }} €
            </li>
        @empty
            <li>Aucun produit pour le moment.</li>
        @endforelse
    </ul>
@endsection
