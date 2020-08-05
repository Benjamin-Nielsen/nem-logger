<?php

namespace BenjaminNielsen\NemLogger;

use BenjaminNielsen\NemLogger\NemLogger;
use Illuminate\Support\ServiceProvider;

class NemLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NemLogger::class, function ($app) {
            return new NemLogger(config('saml2_settings.nem_logs_directory'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
