<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryOutSideController;
use App\Http\Controllers\StoreOutSideController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [HomeController::class, 'single'])->name('product.single');
Route::get('/category/{slug}', [CategoryOutSideController::class, 'index'])->name('category.single');
Route::get('/store/{slug}', [StoreOutSideController::class, 'index'])->name('store.single');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('add', [CartController::class, 'add'])->name('add');
    Route::get('remove/{slug}', [CartController::class, 'remove'])->name('remove');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/proccess', [CheckoutController::class, 'proccess'])->name('proccess');
    Route::get('/thanks', [CheckoutController::class, 'thanks'])->name('thanks');
});

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

    Route::post('photos/remove', [ProductPhotoController::class, 'removePhoto'])->name('admin.photo.remove')->middleware('auth');

});


Auth::routes();

