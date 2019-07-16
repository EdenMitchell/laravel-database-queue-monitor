<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor;

use Carbon\Carbon;
use EdenMitchell\LaravelDatabaseQueueMonitor\Facades\QueueMonitor;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;

class FailedJob
{
    public function failedJobsCount()
    {
        return QueueMonitor::getRecentlyFailedJobsCount();
    }

    public function getFailedJobDetails($id)
    {
        return DB::table('failed_jobs')->where('id',$id)->first();
    }

    public function getSimilarFailedJobs($job, $hours)
    {
        $display_name = json_decode($job->payload)->displayName;
        $searchable_display_name = str_replace('\\','\\\\\\\\',$display_name);

        $similar_jobs_count = DB::table('failed_jobs')
            ->where('failed_at','>',Carbon::now()->subHours($hours))
            ->where('payload','like','%'.$searchable_display_name.'%')->count();

        return $similar_jobs_count;
    }
}