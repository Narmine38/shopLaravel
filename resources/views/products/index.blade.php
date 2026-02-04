@extends('layouts.app')

@section('title', 'Produits')

@section('content')
    <h1>Liste des produits</h1>

    <p>
        <a href="{{ route('products.create') }}">Ajouter un produit</a>
    </p>

    <ul>
        @forelse ($products as $product)
            <li>
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                    {{ $product->id }} - {{ $product->name }}
                </a>
                : {{ number_format($product->price, 2, '.', ' ') }} €
                <a href="{{ route('products.edit', ['product' => $product->id]) }}">Modifier</a>
                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Supprimer ce produit ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @empty
            <li>Aucun produit pour le moment.</li>
        @endforelse
    </ul>
@endsection
