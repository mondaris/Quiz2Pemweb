<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk Berhasil Dihapus.');
    }

    public function availableProducts()
    {
        $availableProducts = Product::where('stock', '>', 0)->get();
        
        return view('products.available', ['availableProducts' => $availableProducts]);
    }

    public function unavailableProducts()
    {
        $unavailableProducts = Product::where('stock', '=', 0)->get();

        return view('products.unavailable', ['unavailableProducts' => $unavailableProducts]);
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);
    
        $product = Product::findOrFail($id);
        $product->stock = $request->stock;
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Stok Berhasil Diupdate');
    }
    public function updateStockForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update_stock', compact('product'));
    }
        

}