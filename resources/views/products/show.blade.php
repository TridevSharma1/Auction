<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">
        @endif

        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <h5>₹ {{ $product->price }}</h5>

            <a href="{{ route('products.create') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

</body>
</html>
