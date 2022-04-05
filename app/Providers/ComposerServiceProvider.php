<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        $categories = Category::all(['name', 'slug']);

        view()->composer('layouts.front', 'App\Http\Views\CategoryViewComposer@compose');
    }
}
