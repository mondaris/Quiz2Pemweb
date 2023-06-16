<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/available', [ProductController::class, 'availableProducts'])->name('products.available');
Route::get('/products/unavailable', [ProductController::class, 'unavailableProducts'])->name('products.unavailable');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/update-stock', [ProductController::class, 'updateStockForm'])->name('products.updateStockForm');
Route::put('/products/{id}/stock', [ProductController::class, 'updateStock'])->name('products.updateStock');
