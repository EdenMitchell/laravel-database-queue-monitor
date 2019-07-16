<?php
use Illuminate\Support\Facades\Route;

Route::get(config('laravel_database_queue_monitor.dashboard_route'),
    'EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\DashboardController@index');
Route::get(config('laravel_database_queue_monitor.failed_job_route') . '{id}',
    'EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\FailedJobsController@view');
Route::get(config('laravel_database_queue_monitor.failed_jobs_route'),
    'EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\FailedJobsController@index');
Route::get(config('laravel_database_queue_monitor.upcoming_jobs_route'),
    'EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\JobsController@index');
Route::get('/latest_jobs_data',
    'EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\DashboardController@latestJobsData');
Route::get('/latest_failed_jobs_data',
    'EdenMitchell\LaravelDatabaseQueueMonitor\Http\Controllers\DashboardController@latestFailedJobsData');