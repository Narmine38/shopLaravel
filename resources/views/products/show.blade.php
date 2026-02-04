@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Prix : {{ number_format($product->price, 2, '.', ' ') }} €</p>

    @if ($product->image)
        <p><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"></p>
    @endif

    @if ($product->description)
        <p>{{ $product->description }}</p>
    @endif

    @if ($product->is_active)
        <p>Statut : disponible</p>
    @else
        <p>Statut : indisponible</p>
    @endif
@endsection
