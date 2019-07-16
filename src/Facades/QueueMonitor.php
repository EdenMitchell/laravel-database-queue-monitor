<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor\Facades;

use Illuminate\Support\Facades\Facade;

class QueueMonitor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'queue-monitor';
    }
}