@extends('layouts.app')

@section('content')
    <center><h1>Produk</h1></center>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <center>
    <a href="{{ route('products.create') }}" class="btn btn-outline-primary mb-3">Tambahkan</a>
    <a href="{{ route('products.available') }}" class="btn btn-outline-secondary mb-3">Stok Tersedia</a>
    <a href="{{ route('products.unavailable') }}" class="btn btn-outline-danger mb-3">Stok Kosong</a>
    </center>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-warning btn-sm">Lihat Produk</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Hapus</button>
                        </form>
                        <a href="{{ route('products.updateStockForm', $product->id) }}" class="btn btn-outline-success btn-sm">Perbaharui Stok</a>
                    </td>
                                 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
