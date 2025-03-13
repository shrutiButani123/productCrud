@extends('layout.app')

@section('content')
<div class="container mt-4">
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->subcategory->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('products.show', $product->id ) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
