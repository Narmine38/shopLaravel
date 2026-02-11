@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <h1>Connexion</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <br><span style="color: #b00020;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password" required>
            @error('password')
                <br><span style="color: #b00020;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label>
                <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                Se souvenir de moi
            </label>
        </p>

        <button class="btn" type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscription</a></p>
@endsection
