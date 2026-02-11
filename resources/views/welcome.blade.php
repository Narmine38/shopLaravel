@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1>Bienvenue sur ShopLaravel</h1>

    @auth
        <p>Ravi de vous revoir, {{ auth()->user()->name }}.</p>
        <p>Accedez aux produits pour commencer vos achats.</p>
    @else
        <p>Connectez-vous ou creez un compte pour acceder au panier.</p>
        <p>
            <a href="{{ route('login') }}">Connexion</a>
            |
            <a href="{{ route('register') }}">Inscription</a>
        </p>
    @endauth
@endsection
