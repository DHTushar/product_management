<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store'])->name('store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('destroy');

