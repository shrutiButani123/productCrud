@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded-lg">
        <div class="card-body">
            <h3>Add Product</h3>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <label>Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Sub Category</label>
                <select id="sub_category" name="subcategory_id" class="form-control @error('sub_category_id') is-invalid @enderror">
                    <option value="">Select Sub Category</option>
                </select>
                @error('sub_category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Price</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
