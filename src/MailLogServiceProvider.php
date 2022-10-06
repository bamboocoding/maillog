<?php

namespace BambooCoding\MailLog;

use Illuminate\Support\ServiceProvider;

class MailLogServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }


    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(MailLogEventServiceProvider::class);
    }
}
