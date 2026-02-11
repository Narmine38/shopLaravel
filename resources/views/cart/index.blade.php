@extends('layouts.app')

@section('title', 'Mon panier')

@section('content')
    <h1>Mon panier</h1>

    @if ($products->isEmpty())
        <p>Votre panier est vide.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantite</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 2, '.', ' ') }} &euro;</td>
                        <td>
                            <form action="{{ route('cart.update', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" min="0" value="{{ $cart[$product->id] ?? 0 }}" style="{{ $errors->has('quantity') ? 'border: 1px solid #b00020;' : '' }}">
                                <button type="submit">Mettre a jour</button>
                            </form>
                            @error('quantity')
                                <br><span style="color: #b00020;">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>{{ number_format($product->price * ($cart[$product->id] ?? 0), 2, '.', ' ') }} &euro;</td>
                        <td>
                            <form action="{{ route('cart.remove', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Total : {{ number_format($total, 2, '.', ' ') }} &euro;</strong></p>

        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Vider le panier</button>
        </form>
    @endif
@endsection
