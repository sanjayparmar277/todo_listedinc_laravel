<?php

namespace App\Providers;

use Config;
use Illuminate\Support\ServiceProvider;
use Schema;
use Str;
use URL;

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
        if ((Config::get('app.url') !== 'http://localhost') && (Str::contains(Config::get('app.url'), 'https://'))) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
    }
}
