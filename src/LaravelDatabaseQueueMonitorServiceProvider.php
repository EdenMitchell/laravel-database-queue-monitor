<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor;

use Illuminate\Support\ServiceProvider;
use EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\JobsController;
use EdenMitchell\LaravelDatabaseQueueMonitor\QueueMonitor;

class LaravelDatabaseQueueMonitorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'queue-monitor');
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel_database_queue_monitor')
        ],'views');

        $this->publishes([
            __DIR__ . '/../config/laravel_database_queue_monitor.php' => base_path('config/laravel_database_queue_monitor.php')
        ], 'config');
    }

    public function register()
    {
        $this->app->bind('queue-monitor', function() {
            return new QueueMonitor();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/laravel_database_queue_monitor.php',
            'laravel_database_queue_monitor');
    }
}