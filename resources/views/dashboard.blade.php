@extends('queue-monitor::layout')
@section('body')
    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="flex flex-row" id="not-auto-refreshing-message" style="display:none">
            <div class="w-full p-3">
                <div class="rounded-lg p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Not refreshing</h5>
                            <h3 class="font-bold text-lg">
                                Due to inactivity, the page is no longer auto-refreshing. Please refresh the page to
                                enable auto-refresh.
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            @include('queue-monitor::charts.upcoming_jobs_count')
            @include('queue-monitor::charts.running_jobs_count')
            @include('queue-monitor::charts.failed_jobs_count')
        </div>


        <div class="flex flex-row flex-wrap flex-grow mt-2">
            <div id="upcoming-jobs" class="text-sm md:text-base md:w-1/2">
                @include('queue-monitor::charts.upcoming_jobs')
            </div>
            <div id="failed-jobs" class="md:w-1/2">
                @include('queue-monitor::charts.failed_jobs',['dashboard' => true])
            </div>
        </div>
    </div>

    <script>
        var getJobData = setInterval(function() {
            $.ajax({
                type: "GET",
                url: "{{url('/latest_jobs_data')}}",
                success: function (data) {
                    $("#upcoming-jobs").html(data.upcoming_jobs_table);
                    $("#upcoming-jobs-count").html(data.upcoming_jobs_count);
                    $("#running-jobs-count").html(data.running_jobs_count);
                }
            })
        }, 10000);

        var getFailedJobData = setInterval(function() {
            $.ajax({
                type: "GET",
                url: "{{url('/latest_failed_jobs_data')}}",
                success: function(data) {
                    $("#failed-jobs-count").html(data.recently_failed_jobs_count);
                    $("#failed-jobs").html(data.failed_jobs_table);
                }
            })
        }, 60000);

        setTimeout(function() {
            clearInterval(getJobData);
            clearInterval(getFailedJobData);
            $("#not-auto-refreshing-message").show();
        }, {{config('laravel_database_queue_monitor.auto_refresh_timeout')}});
    </script>
@endsection