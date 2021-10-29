<?php

namespace App\Providers;

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
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Beer\BeerDaoInterface', 'App\Dao\Beer\BeerDao');
        $this->app->bind('App\Contracts\Dao\Brewery\BreweryDaoInterface', 'App\Dao\Brewery\BreweryDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Beer\BeerServiceInterface', 'App\Services\Beer\BeerService');
        $this->app->bind('App\Contracts\Services\Brewery\BreweryServiceInterface', 'App\Services\Brewery\BreweryService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
