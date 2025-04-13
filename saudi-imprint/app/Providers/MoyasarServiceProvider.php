<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Moyasar\Moyasar;

class MoyasarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('moyasar', function ($app) {
            Moyasar::setApiKey(config('moyasar.secret_key'));
            return new Moyasar();
        });
    }

    public function boot()
    {
        //
    }
}