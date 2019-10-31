<?php

namespace App\Providers;
use App\BookCategory;
use Illuminate\Support\ServiceProvider;

class DynamicClassServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('bookcat_array', BookCategory::all());
        });
    }
}
