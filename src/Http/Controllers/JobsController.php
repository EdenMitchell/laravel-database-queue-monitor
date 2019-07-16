<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers;

use Carbon\Carbon;
use EdenMitchell\LaravelDatabaseQueueMonitor\Facades\QueueMonitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class JobsController
{
    public function index()
    {
        $upcoming_jobs = QueueMonitor::getJobs();
        return view('queue-monitor::upcoming_jobs_index', compact('upcoming_jobs'));
    }
}