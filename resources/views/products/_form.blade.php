<p>
    <label for="category_id">Categorie</label><br>
    <select name="category_id" id="category_id" required style="{{ $errors->has('category_id') ? 'border: 1px solid #b00020;' : '' }}">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <br><span style="color: #b00020;">{{ $message }}</span>
    @enderror
</p>

<p>
    <label for="name">Nom</label><br>
    <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required style="{{ $errors->has('name') ? 'border: 1px solid #b00020;' : '' }}">
    @error('name')
        <br><span style="color: #b00020;">{{ $message }}</span>
    @enderror
</p>

<p>
    <label for="description">Description</label><br>
    <textarea name="description" id="description" rows="4" required style="{{ $errors->has('description') ? 'border: 1px solid #b00020;' : '' }}">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <br><span style="color: #b00020;">{{ $message }}</span>
    @enderror
</p>

<p>
    <label for="price">Prix</label><br>
    <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price ?? '') }}" required style="{{ $errors->has('price') ? 'border: 1px solid #b00020;' : '' }}">
    @error('price')
        <br><span style="color: #b00020;">{{ $message }}</span>
    @enderror
</p>

<p>
    <label for="stock">Stock</label><br>
    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? 0) }}" required style="{{ $errors->has('stock') ? 'border: 1px solid #b00020;' : '' }}">
    @error('stock')
        <br><span style="color: #b00020;">{{ $message }}</span>
    @enderror
</p>

<p>
    <label for="image">Image du produit</label><br>
    <input type="file" name="image" id="image" accept="image/*" style="{{ $errors->has('image') ? 'border: 1px solid #b00020;' : '' }}">
    @error('image')
        <br><span style="color: #b00020;">{{ $message }}</span>
    @enderror
</p>

<p>
    <label>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active ?? true))>
        Actif
    </label>
</p>
