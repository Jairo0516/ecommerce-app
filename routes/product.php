<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::prefix('product')->group(function () {

    Route::get('/list', [ProductController::class, 'all'])->name('product/list');

    Route::get('/create', function () {
        return Inertia::render('Shop/CreateProduct');
    })->name('product/create');

    Route::post('register', [ProductController::class, 'create'])->name("product.store");

    Route::get('/show', [ProductController::class, 'filter'])->name('product/show');

    Route::get('/edit', [ProductController::class, 'edit'])->name('product.edit');

    Route::put('update', [ProductController::class, 'update'])->name("product.update");

})->middleware(['auth', 'verified']);





