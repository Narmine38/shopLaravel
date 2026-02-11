@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
    <h1>Inscription</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <p>
            <label for="name">Nom</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <br><span style="color: #b00020;">{{ $message }}</span>
            @enderror
        </p>

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
            <label for="password_confirmation">Confirmation du mot de passe</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </p>

        <button class="btn" type="submit">Creer mon compte</button>
    </form>

    <p>Deja un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
@endsection
