<?php

namespace GraphicGenie\LaravelOxxa;

use Illuminate\Support\ServiceProvider;

class LaravelOxxaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind("oxxa", function ($app) {
            return new LaravelOxxa();
        });

        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php",
            "laravel-oxxa"
        );
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . "/../config/config.php" => config_path(
                        "laravel-oxxa.php"
                    ),
                ],
                "config"
            );
        }
    }
}
