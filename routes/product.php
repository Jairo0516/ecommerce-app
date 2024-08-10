<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::prefix('product')->group(function () {

    Route::get('/list', function () {
        $filter = request('filter');
        $product = new ProductController();
        $product = $product->all($filter);

        return Inertia::render('Shop/ListProduct',      [
            'products' => $product
        ]);
    })->name('product/list');


    Route::get('/show', function () {
        $id = request('product');
        $product = new ProductController();
        $product = $product->show($id);
        return Inertia::render('Shop/ViewProduct', [
            'product' => $product
        ]);
    })->name('product/show');

    Route::get('/create', function () {
        return Inertia::render('Shop/CreateProduct');
    })->name('product/create');


    Route::post('register', [ProductController::class, 'store'])->name("product.store");

    Route::get('/edit', function () {
        $id = request('product');
        $product = new ProductController();
        $product = $product->show($id);
        return Inertia::render('Shop/EditProduct', [
            'product' => $product
        ]);
    })->name('product.edit');

    Route::put('update', [ProductController::class, 'update'])->name("product.update");


})->middleware(['auth', 'verified']);





