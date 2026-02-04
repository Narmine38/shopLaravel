@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
    <h1>Modifier un produit</h1>

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('products._form', ['product' => $product])

        <button type="submit">Mettre a jour</button>
    </form>
@endsection
