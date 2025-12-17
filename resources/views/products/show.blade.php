@extends('layouts.app')

@section('title', 'Auction Bid')

@section('content')
    <style>
        body {
            background-color: #eaeded;
            font-family: Arial, sans-serif;
        }
        .product-title {
            font-size: 24px;
            font-weight: 500;
        }
        .price {
            color: #B12704;
            font-size: 26px;
            font-weight: bold;
        }
        .buy-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }
        .buy-btn {
            background-color: #FFD814;
            border: 1px solid #FCD200;
        }
        .buy-btn:hover {
            background-color: #F7CA00;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('products.Home') }}">Auction Store</a>
    </div>
</nav>

<!-- Product Section -->
<div class="container my-4 bg-white p-4 rounded shadow-sm">
    <div class="row">

        <!-- Image Column -->
        <div class="col-md-5 text-center">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded" style="max-height:420px;">
            @else
                <img src="https://via.placeholder.com/400x400?text=No+Image" class="img-fluid">
            @endif
        </div>

        <!-- Product Info -->
        <div class="col-md-4">
            <h1 class="product-title">{{ $product->name }}</h1>
            <hr>

            <p class="mb-1">Current Bid</p>
            <div class="price">₹ {{ number_format($product->price, 2) }}</div>

            <p class="text-muted mt-2">
                Auction ends on <br>
                <strong>
                    {{ \Carbon\Carbon::parse($product->end_date)->format('d M Y, h:i A') }}
                </strong>
            </p>

            <hr>

            <h6>About this item</h6>
            <p class="small">{{ $product->description }}</p>
        </div>

        <!-- Buy / Bid Box -->
        <div class="col-md-3">
            <div class="buy-box p-3 shadow-sm">
                <div class="price mb-2">₹ {{ number_format($product->price, 2) }}</div>

                <p class="small text-success">In Stock</p>

                <p class="small">
                    Sold by <strong>Auction House</strong><br>
                    Secure Transaction
                </p>

                <button class="btn buy-btn w-100 mb-2">
                    Bid Now
                </button>

                <button class="btn btn-outline-secondary w-100 mb-2">
                    Add to Watchlist
                </button>

                <a href="{{ route('products.Home') }}" class="btn btn-link w-100 text-decoration-none">
                    ← Back to Auctions
                </a>
            </div>
        </div>

    </div>
</div>
<!-- Other Products Section -->
<div class="container my-5">
    <h4 class="mb-3">Other Auction Items You May Like</h4>

    <div class="row g-3">
        @forelse($otherProducts as $item)
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="card h-100 shadow-sm border-0">

                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}"
                             class="card-img-top"
                             style="height:150px; object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/200x200?text=No+Image"
                             class="card-img-top">
                    @endif

                    <div class="card-body p-2">
                        <h6 class="small mb-1">
                            {{ Str::limit($item->name, 40) }}
                        </h6>

                        <span class="text-danger fw-bold small">
                            ₹ {{ number_format($item->price, 2) }}
                        </span>
                    </div>

                    <div class="card-footer bg-white border-0 p-2">
                        <a href="{{ route('products.show', $item->id) }}"
                           class="btn btn-sm btn-outline-primary w-100">
                            View
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <p class="text-muted">No other Auction available.</p>
        @endforelse
    </div>
</div>

@endsection