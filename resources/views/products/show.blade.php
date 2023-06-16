@extends('layouts.app')

@section('content')
    <h1>Detail Produk</h1>

    <div class="card bg-success">
        <div class="card-body">
            <p class="card-text"><b>Nama Produk:</b> {{ $product->name }}</p>
            <p class="card-text"><b>Harga:</b> {{ $product->price }}</p>
            <p class="card-text"><b>Stok:</b> {{ $product->stock }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary mt-3">Back</a>
@endsection
