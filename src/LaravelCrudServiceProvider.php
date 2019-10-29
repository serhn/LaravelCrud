<?php

namespace Serh\LaravelCrud;

use Illuminate\Support\ServiceProvider;

class LaravelCrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/crud', 'crud');
        $this->publishes(
            [
                __DIR__ . '/../resources/view/crud' => resource_path("views") . "/crud",
            ]
        );

    }
}
