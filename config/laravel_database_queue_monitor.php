<?php

return [
    // Title
    'title' => 'Laravel Database Queue Monitor',

    // Subtitle
    'subtitle' => 'EdenMitchell/laravel-database-queue-monitor',

    // Route for dashboard
    'dashboard_route' => '/queue-monitor',

    // Route for failed_job details. This will always have "/{id}" after it.
    'failed_job_route' => '/failed-job/',

    // Route for all failed jobs for last month
    'failed_jobs_route' => '/failed-jobs',

    // Route for all queued jobs
    'upcoming_jobs_route' => '/upcoming-jobs',

    // This value will be displayed throughout the views. Eg. 2pm (UTC)
    'database_timezone' => 'UTC',

    // Determines the amount of time before your dashboard stops auto-refreshing
    'auto_refresh_timeout' => 600000
];