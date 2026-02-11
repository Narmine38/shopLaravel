@extends('layouts.app')

@section('title', 'Creer un produit')

@section('content')
    <h1>Creer un produit</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div style="border: 1px solid #b00020; padding: 12px; margin-bottom: 16px;">
                <strong>Veuillez corriger les erreurs ci-dessous :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('products._form')

        <button type="submit">Enregistrer</button>
    </form>
@endsection
