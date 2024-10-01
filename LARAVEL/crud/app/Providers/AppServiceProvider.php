<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // View::share('sharedData', 'This is shared data');
        View::composer('*', function ($view) {
            $view->with('sharedData', 'This is our value as shared by a view composer');
        });
    }
}
