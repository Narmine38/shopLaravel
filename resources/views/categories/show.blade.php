@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <h1>{{ $category->name }}</h1>

    @if ($category->description)
        <p>{{ $category->description }}</p>
    @endif

    <h2>Produits</h2>

    <ul>
        @forelse ($products as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                : {{ number_format($product->price, 2, '.', ' ') }} €
            </li>
        @empty
            <li>Aucun produit dans cette categorie.</li>
        @endforelse
    </ul>

    {{ $products->links() }}
@endsection
