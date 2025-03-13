@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Product</h3>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>

        <label>Current Image</label>
        <br>
        @if($product->image)
            <img src="{{ asset($product->image) }}" width="100" class="mb-2">
        @endif
        <br>
        <label>Change Image</label>
        <input type="file" name="image" class="form-control">

        <label>Category</label>
        <select name="category_id" id="category" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Subcategory</label>
        <select name="subcategory_id" id="sub_category" class="form-control">
            @foreach ($product->category->subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </select>

        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>

        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
