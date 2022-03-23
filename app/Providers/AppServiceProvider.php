<?php

namespace App\Providers;

use App\Category;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Place")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Place")->setRelease("1.0.0");

        $categories = Category::all(['name', 'slug']);
        view()->share('categories', $categories);
    }
}
