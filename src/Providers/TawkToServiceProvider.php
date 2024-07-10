<?php

namespace RZQ\TawkTo\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;

class TawkToServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__.'/../config/tawkto.php' => config_path('tawkto.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $router = $this->app->make(Router::class);
        $kernel->appendMiddlewareToGroup('web', Authenticate::class);
        $router->aliasMiddleware('tawk.auth', Authenticate::class);
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
