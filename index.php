<?php

use \EdenMitchell\LaravelDatabaseQueueMonitor\QueueMonitor;

require 'vendor/autoload.php';

QueueMonitor::getLatestFailedJobs();