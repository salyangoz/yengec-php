<?php

namespace Yengec;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/yengec.php' => config_path('yengec.php')
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/yengec.php', 'yengec');
        $this->app->singleton(YengecInterface::class, function () {
            return new Yengec(
                config('yengec.is_test'),
                config('yengec.client_id'),
                config('yengec.client_secret')
            );
        });
    }
}
