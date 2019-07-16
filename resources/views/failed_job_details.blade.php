@extends('queue-monitor::layout')
@section('body')
    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 p-3">
                <!--Metric Card-->
                <div class="bg-red-100 border-b-4 border-red-500 rounded-lg shadow-lg p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Similar failed jobs past 24 hours</h5>
                            <h3 class="font-bold text-3xl">{{$similar_failed_jobs_last_day}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 p-3">
                <!--Metric Card-->
                <div class="bg-red-100 border-b-4 border-red-500 rounded-lg shadow-lg p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Similar failed jobs past week</h5>
                            <h3 class="font-bold text-3xl">{{$similar_failed_jobs_last_week}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

        </div>


        <div class="flex flex-row flex-wrap flex-grow mt-2">

            <div class="w-full p-3">
                <div class="bg-white border-transparent rounded-lg shadow-lg">
                    <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                        <h5 class="font-bold uppercase text-gray-600">Job Details</h5>
                    </div>
                    <div class="w-full">
                        <div class="bg-white shadow-md rounded p-3 break-all">

                            <div class="font-bold mb-2">
                                {{json_decode($job->payload)->displayName}}
                            </div>
                            <div class="mb-2">
                                <strong>Failed at:</strong><br>
                                {{\Carbon\Carbon::parse($job->failed_at)->format('Y-m-d H:i:s')}} ({{config('laravel_database_queue_monitor.database_timezone')}})
                            </div>
                            <div class="mb-2">
                                <strong>Exception:</strong><br>
                                {!! nl2br($job->exception) !!}
                            </div>
                            <div class="mb-2">
                                <strong>Payload:</strong><br>
                                @foreach(json_decode($job->payload) as $key => $value)
                                    @if(gettype($value) == 'string')
                                        {{$key}}: {{$value}}<br>
                                    @elseif($value === null)
                                        {{$key}}: null<br>
                                    @elseif(gettype($value) === 'object')
                                        {{$key}}: {{json_encode($value)}}
                                    @else
                                        <strong>Some data was in an unrecognised format and could not be displayed</strong>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
