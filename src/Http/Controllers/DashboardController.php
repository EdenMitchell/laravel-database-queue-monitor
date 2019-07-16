<?php

namespace EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers;

use EdenMitchell\LaravelDatabaseQueueMonitor\Facades\QueueMonitor;
use Illuminate\Queue\Queue;
use Illuminate\Support\Facades\Response;

class DashboardController
{
    public function index()
    {
        $upcoming_jobs_count = QueueMonitor::getUpcomingJobsCount();
        $running_jobs_count = QueueMonitor::getRunningJobsCount();
        $recently_failed_jobs_count = QueueMonitor::getRecentlyFailedJobsCount();
        $upcoming_jobs = QueueMonitor::getUpcomingJobs();
        $failed_jobs = QueueMonitor::getRecentlyFailedJobs();
        return view('queue-monitor::dashboard', compact(
            'upcoming_jobs_count',
            'running_jobs_count',
            'recently_failed_jobs_count',
            'upcoming_jobs',
            'failed_jobs'));
    }

    public function latestJobsData()
    {
        $upcoming_jobs_count = QueueMonitor::getUpcomingJobsCount();
        $running_jobs_count = QueueMonitor::getRunningJobsCount();
        $upcoming_jobs = QueueMonitor::getUpcomingJobs();
        $upcoming_jobs_table = view('queue-monitor::charts.upcoming_jobs',compact('upcoming_jobs'))->render();
        return Response::json(compact('upcoming_jobs_table','upcoming_jobs_count','running_jobs_count'));
    }

    public function latestFailedJobsData()
    {
        $recently_failed_jobs_count = QueueMonitor::getRecentlyFailedJobsCount();
        $failed_jobs = QueueMonitor::getRecentlyFailedJobs();
        $failed_jobs_table = view('queue-monitor::charts.failed_jobs',compact('failed_jobs'))->render();
        return Response::json(compact('recently_failed_jobs_count','failed_jobs_table'));
    }
}