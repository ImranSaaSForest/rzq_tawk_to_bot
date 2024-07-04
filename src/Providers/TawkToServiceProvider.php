<?php

namespace RZQ\TawkTo\Providers;

use Illuminate\Support\ServiceProvider;

class TawkToServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__.'/../config/tawkto.php' => config_path('tawkto.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/tawkto.php', 'tawkto'
        );

        // Bind the TawkTo class to the service container
        $this->app->singleton('tawkto', function ($app) {
            return new \RZQ\TawkTo\TawkTo();
        });
    }
}
