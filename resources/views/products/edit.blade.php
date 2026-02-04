@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
    <h1>Modifier un produit</h1>

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="category_id">Categorie</label><br>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="name">Nom</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </p>

        <p>
            <label for="price">Prix</label><br>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required>
        </p>

        <p>
            <label for="stock">Stock</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
        </p>

        <p>
            <label>
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active))>
                Actif
            </label>
        </p>

        <button type="submit">Mettre a jour</button>
    </form>
@endsection
