@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href=''>Shoes So</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.available') }}">Stok Tersedia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.unavailable') }}">Stok Kosong</a>
            </li>
          </ul>
        </div>
      </nav>
      <h1 class="text-center">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="btn btn-outline-primary mb-3">+ Tambahkan</a>
    <table class="table table-secondary table-striped table-hover">
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
