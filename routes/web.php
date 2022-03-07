<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;



Route::get('/', function(){})->name('home');


Route::prefix('admin')->group(function()
{

    Route::prefix('stores')->name('admin.stores.')->group(function()
    {
        Route::get('/', [StoreController::class, 'index'])->name('index')->middleware('auth');
        Route::get('/create', [StoreController::class, 'create'])->name('create')->middleware('auth');
        Route::post('/store', [StoreController::class, 'store'])->name('store')->middleware('auth');
        Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('edit')->middleware('auth');
        Route::put('/update/{store}', [StoreController::class, 'update'])->name('update')->middleware('auth');
        Route::delete('/destroy/{store}', [StoreController::class, 'destroy'])->name('destroy')->middleware('auth');
    });

    Route::prefix('products')->name('admin.products.')->group(function()
    {
        Route::get('/', [ProductController::class, 'index'])->name('index')->middleware('auth');
        Route::get('/create', [ProductController::class, 'create'])->name('create')->middleware('auth')->middleware('auth');
        Route::post('/store', [ProductController::class, 'store'])->name('store')->middleware('auth');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit')->middleware('auth');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update')->middleware('auth');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy')->middleware('auth');
    });

    Route::prefix('categories')->name('admin.categories.')->group(function()
    {
        Route::get('/', [CategoryController::class, 'index'])->name('index')->middleware('auth');
        Route::get('/create', [CategoryController::class, 'create'])->name('create')->middleware('auth')->middleware('auth');
        Route::post('/store', [CategoryController::class, 'store'])->name('store')->middleware('auth');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit')->middleware('auth');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update')->middleware('auth');
        Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy')->middleware('auth');
    });

        // Route::resource('/products', ProductController::class);
        // Route::resource('/stores', StoreController::class);
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home', [HomeController::class, 'index'])->name('home');
