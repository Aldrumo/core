<?php

namespace Aldrumo\Core\Providers;

use Illuminate\Support\ServiceProvider;

class AldrumoCoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/fortify.php',
            'fortify'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/jetstream.php',
            'jetstream'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/fortify.php'   => config_path('fortify.php'),
            __DIR__ . '/../../config/jetstream.php' => config_path('jetstream.php'),
        ]);
    }
}
