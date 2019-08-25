<?php

namespace App\Providers;

use App;
use URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::setLocale('es');
        Schema::defaultStringLength(191);
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
    }





    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
