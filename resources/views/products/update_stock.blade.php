@extends('layouts.app')

@section('content')
    <h1>Pembaruan Stok</h1>

    <div>
        <p><strong>Nama Barang:</strong> {{ $product->name }}</p>
        <p><strong>Jumlah Stok:</strong> {{ $product->stock }}</p>
    </div>

    <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="stock">Jumlah Stok Baru</label>
            <input type="number" name="stock" id="stock" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-primary">Perbaharui</button>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
@endsection
