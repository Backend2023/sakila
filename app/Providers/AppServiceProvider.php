<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // https://laravel.com/docs/11.x/routing#parameters-global-constraints
        // Ovo dolje ograničava sve varijable $id rute na numeričke
        // kao da smo na rutu s id dodali  ->where('id', '[0-9]+');
        //  routes/web.php:
        Route::pattern('id', '[0-9]+');
    }
}
