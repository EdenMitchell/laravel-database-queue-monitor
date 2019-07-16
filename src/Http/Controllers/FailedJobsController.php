<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers;

use Carbon\Carbon;
use EdenMitchell\LaravelDatabaseQueueMonitor\Facades\QueueMonitor;
use EdenMitchell\LaravelDatabaseQueueMonitor\FailedJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class FailedJobsController
{
    public function index() {
        $failed_jobs = QueueMonitor::getFailedJobs();
        return view('queue-monitor::failed_jobs_index', compact('failed_jobs'));
    }

    public function view($id) {
        $job = DB::table('failed_jobs')->find($id);
        if(!$job) {
            abort(404);
        }
        $failed_job = new FailedJob();
        $similar_failed_jobs_last_day = $failed_job->getSimilarFailedJobs($job, 24);
        $similar_failed_jobs_last_week = $failed_job->getSimilarFailedJobs($job, 168);
        return view('queue-monitor::failed_job_details',
            compact(
                'similar_failed_jobs_last_day',
                'similar_failed_jobs_last_week',
                'job')
        );
    }

    public function latestFailedJobsData()
    {
        $recently_failed_jobs_count = QueueMonitor::getRecentlyFailedJobsCount();
        $failed_jobs = QueueMonitor::getRecentlyFailedJobs();
        return Response::json(compact('recently_failed_jobs_count','failed_jobs'));
    }
}