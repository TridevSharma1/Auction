@extends('layouts.app')

@section('title', 'Create Auction')

@section('content')
<div class="container mt-4">
    <h3>Products</h3>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        Add Product
    </a>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>₹{{ $product->price }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">
                    View
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
