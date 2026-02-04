@extends('layouts.app')

@section('title', 'Creer un produit')

@section('content')
    <h1>Creer un produit</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('products._form')

        <button type="submit">Enregistrer</button>
    </form>
@endsection
