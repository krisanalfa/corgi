<?php

namespace App\Providers;

use Monolog\Logger;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\RotatingFileHandler;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->app->configureMonologUsing(function(Logger $monolog) use ($app) {
            return $monolog->pushHandler(
                new RotatingFileHandler($app->storagePath().'/logs/corgi.log', 5)
            );
        });
    }
}
