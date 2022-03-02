<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;


Route::prefix('admin')->group(function()
{
    Route::prefix('stores')->name('admin.stores.')->group(function()
    {
        Route::get('/', [StoreController::class, 'index'])->name('index');
        Route::get('/create', [StoreController::class, 'create'])->name('create');
        Route::post('/store', [StoreController::class, 'store'])->name('store');
        Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('edit');
        Route::put('/update/{store}', [StoreController::class, 'update'])->name('update');
        Route::get('/destroy/{store}', [StoreController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('products')->name('admin.products.')->group(function()
    {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::get('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

     // Route::resource('/products', ProductController::class);

});





