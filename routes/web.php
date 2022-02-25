<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/stores', [StoreController::class, 'index']);

