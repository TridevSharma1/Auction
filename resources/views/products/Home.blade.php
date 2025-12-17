@extends('layouts.app')

@section('title', 'Auction')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(to right, #1d3557, #457b9d);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }
        .auction-card img {
            height: 220px;
            object-fit: cover;
        }
        footer {
            background: #212529;
            color: #adb5bd;
        }
    </style>
</head>
<body>
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="display-5 fw-bold">Live Auction Items</h1>
        <p class="lead">Bid on exclusive items before time runs out!</p>
    </div>
</section>

<!-- Auction Items -->
<section class="container my-5">
    <div class="row g-4">

        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card auction-card shadow-sm h-100">
                
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                @else
                    <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img-top">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">
                        {{ Str::limit($product->description, 80) }}
                    </p>

                    <p class="mb-1">
                        <strong>Current Bid:</strong>
                        <span class="text-success">₹{{ number_format($product->price, 2) }}</span>
                    </p>

                    <p class="small text-danger">
                        Ends on: {{ \Carbon\Carbon::parse($product->end_date)->format('d M Y, h:i A') }}
                    </p>
                </div>

                <div class="card-footer bg-white border-0">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">
                        View & Bid
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <h5 class="text-muted">No auction items available</h5>
        </div>
        @endforelse

    </div>
</section>

@endsection