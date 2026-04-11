@extends('layouts.master')
@section('judul')
  Detail Product Buku
@endsection

@section('content')
<div class="container mt-4">
    <div class="card border-0 shadow-sm p-4">
        <div class="text-center mb-4">
            <img src="{{ asset('images/' . $product->image) }}" class="img-fluid rounded" style="max-height: 400px; width: 25%; object-fit: cover;" alt="{{ $product->name }}">
        </div>

        <h2 class="text-primary font-weight-bold">{{ $product->name }}</h2>

        <h4 class="text-primary mb-2">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </h4>

        <p class="text-muted mb-4">Stock : {{ $product->stock }}</p>

        <div class="product-description mb-5">
            <p class="text-justify" style="line-height: 1.6;">
                {{ $product->description }}
            </p>
        </div>

        <div class="mt-auto">
            <a href="/product" class="btn btn-info text-white rounded-pill px-4">Kembali</a>
        </div>
    </div>
</div>
@endsection

