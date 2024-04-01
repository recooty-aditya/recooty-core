<?php

namespace Recooty;

use Illuminate\Support\ServiceProvider;

class RecootyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/enums' => app_path('Enums'),
        ], 'enums');

        $this->publishes([
            __DIR__.'/services' => app_path('Services'),
        ], 'services');

        $this->publishes([
            __DIR__.'/traits' => app_path('Traits'),
        ], 'traits');

        $this->publishes([
            __DIR__.'/models' => app_path('Models'),
        ], 'models');
    }

    public function register()
    {
        // Register any package services
    }
}
