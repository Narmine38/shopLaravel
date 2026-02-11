<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'ShopLaravel')</title>
    </head>
    <body>
        <header>
            <nav>
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('about') }}">A propos</a>
                <a href="{{ url('/contact') }}">Contact</a>
                <a href="{{ route('products.index') }}">Produits</a>
                @php
                    $cartCount = array_sum(session('cart', []));
                @endphp
                <a href="{{ route('cart.index') }}">Panier ({{ $cartCount }})</a>
            </nav>
        </header>

        <main>
            @if (session('success'))
                <p style="color: #0a7b34;">{{ session('success') }}</p>
            @endif

            @if (session('error'))
                <p style="color: #b00020;">{{ session('error') }}</p>
            @endif

            @yield('content')
        </main>

        <footer>
            &copy; {{ date('Y') }} ShopLaravel
        </footer>
    </body>
</html>
