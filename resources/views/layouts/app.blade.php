<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'ShopLaravel')</title>
        <style>
            :root {
                color-scheme: light;
                --bg: #f6f2ea;
                --text: #1f1b16;
                --accent: #1b6f5a;
                --danger: #b00020;
                --card: #ffffff;
                --border: #d8cfc2;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: "Georgia", "Times New Roman", serif;
                background: var(--bg);
                color: var(--text);
                line-height: 1.5;
            }

            header {
                background: #f1e7d7;
                border-bottom: 2px solid var(--border);
            }

            nav {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 16px;
                max-width: 960px;
                margin: 0 auto;
                padding: 16px 20px;
            }

            nav a {
                text-decoration: none;
                color: var(--text);
                font-weight: 600;
            }

            nav a:hover {
                color: var(--accent);
            }

            .auth-links {
                margin-left: auto;
                display: flex;
                align-items: center;
                gap: 12px;
            }

            main {
                max-width: 960px;
                margin: 0 auto;
                padding: 32px 20px 48px;
            }

            .flash {
                border: 1px solid var(--border);
                background: var(--card);
                padding: 12px 16px;
                margin-bottom: 20px;
            }

            .flash.success {
                border-color: var(--accent);
                color: var(--accent);
            }

            .flash.error {
                border-color: var(--danger);
                color: var(--danger);
            }

            footer {
                text-align: center;
                padding: 24px;
                border-top: 1px solid var(--border);
                background: #f1e7d7;
            }

            .btn {
                background: var(--accent);
                color: #fff;
                border: none;
                padding: 6px 12px;
                cursor: pointer;
            }

            .btn-link {
                background: none;
                border: none;
                padding: 0;
                color: var(--text);
                font-weight: 600;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <header>
            <nav>
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('products.index') }}">Produits</a>
                @php
                    $cartCount = array_sum(session('cart', []));
                @endphp
                <a href="{{ route('cart.index') }}">Panier ({{ $cartCount }})</a>

                <div class="auth-links">
                    @auth
                        <span>Bonjour {{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn-link" type="submit">Deconnexion</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>
                        <a href="{{ route('register') }}">Inscription</a>
                    @endauth
                </div>
            </nav>
        </header>

        <main>
            @if (session('success'))
                <div class="flash success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="flash error">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>

        <footer>
            &copy; {{ date('Y') }} ShopLaravel
        </footer>
    </body>
</html>
