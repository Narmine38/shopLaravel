@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1>Bienvenue chez {{ $shop['name'] }}</h1>
    <p>Nous proposons {{ $shop['product_count'] }} produits.</p>

    @if ($shop['is_open'])
        <p>La boutique est ouverte aujourd'hui.</p>
    @else
        <p>La boutique est fermee pour le moment.</p>
    @endif
@endsection
