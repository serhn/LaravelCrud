<?php

namespace App\Providers;

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
            ]//,
            //[
            //    __DIR__ . '/../routes/admin.php' => base_path("routes") . "/admin.php",
           // ]
        );

        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
    }
}
