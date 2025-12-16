@extends('layouts.app')

@section('title', 'Create Auction')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Create Auction Product</h4>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Product Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Product Name *</label>
                            <input type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter product name"
                                value="{{ old('name') }}"
                                required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Product Description</label>
                            <textarea name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Describe the item">{{ old('description') }}</textarea>
                        </div>

                        <div class="row">
                            {{-- Starting Price --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Starting Price (₹) *</label>
                                <input type="number"
                                    name="price"
                                    class="form-control"
                                    step="0.01"
                                    min="0"
                                    placeholder="0.00"
                                    value="{{ old('price') }}"
                                    required>
                            </div>

                            {{-- Auction End Date --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Auction End Date *</label>
                                <input type="datetime-local"
                                    name="end_date"
                                    class="form-control"
                                    value="{{ old('end_date') }}"
                                    required>
                            </div>
                        </div>

                        {{-- Product Image --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Product Image</label>
                            <input type="file"
                                name="image"
                                class="form-control">
                            <small class="text-muted">
                                JPG, PNG, JPEG (Max: 2MB)
                            </small>
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Create Auction
                            </button>
                            <a class="btn btn-danger btn-lg" href="{{ route('products.index') }}">Back</a>
                        </div>
                       
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection