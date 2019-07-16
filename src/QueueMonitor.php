<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor;

use Carbon\Carbon;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;

class QueueMonitor
{
    public function getJobs()
    {
        return DB::table('jobs')->orderBy('available_at','asc')->get();
    }

    public function getUpcomingJobs()
    {
        return DB::table('jobs')
            ->orderBy('available_at','asc')->limit(20)->get();
    }

    public function getRecentlyFailedJobs()
    {
        return DB::table('failed_jobs')
            ->where('failed_at','>',Carbon::now()->subDay())->orderBy('failed_at','desc')->limit(20)->get();
    }

    public function getUpcomingJobsCount()
    {
        return DB::table('jobs')->count();
    }

    public function getRunningJobsCount()
    {
        return DB::table('jobs')->whereNotNull('reserved_at')->count();
    }

    public function getRecentlyFailedJobsCount($hours = 3)
    {
        return DB::table('failed_jobs')
            ->where('failed_at','>',Carbon::now()->subHours($hours))->count();
    }

    public function getFailedJobs()
    {
        return DB::table('failed_jobs')
            ->where('failed_at','>',Carbon::now()->subMonth())
            ->orderBy('failed_at','desc')
            ->get();
    }
}