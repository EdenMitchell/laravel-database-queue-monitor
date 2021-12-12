<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('laravel_database_queue_monitor.name')}}</title>
    <meta name="author" content="name">
    <meta name="description" content="A queue monitor for the Laravel Database Queue">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    {{-- <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style>
        .dataTable {
            width:100% !important;
        }
        .dataTables_length {
            padding:15px;
        }
        .dataTables_filter {
            padding:15px;
        }
        .dataTables_info {
            padding:15px;
        }
        .dataTables_paginate {
            padding:15px;
        }
        th {
            display:none;
        }
    </style>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body class="bg-gray-900 font-sans leading-normal tracking-normal mt-12">

<!--Nav-->
<nav class="bg-gray-900 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

    <div class="flex flex-wrap items-center">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <a href="{{config('laravel_database_queue_monitor.dashboard_route')}}">
                <span class="text-xl pl-2">{{config('laravel_database_queue_monitor.title')}}</span><br>
                <span class="text-xs text-gray-600 pl-2">{{config('laravel_database_queue_monitor.subtitle')}}</span><br>
            </a>
        </div>

        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white p-2">
                <span class="relative w-full text-center">

                </span>
        </div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
            </ul>
        </div>
    </div>

</nav>


<div class="flex flex-col md:flex-row">
    <div class="bg-gray-900 shadow-lg h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{config('laravel_database_queue_monitor.dashboard_route')}}"
                       class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2
                       {{'/'.request()->path() == config('laravel_database_queue_monitor.dashboard_route')?'border-blue-600':'border-gray-800 hover:border-blue-600'}}">
                        <i class="fas fa-bullseye pr-0 md:pr-3
                            {{'/'.request()->path() == config('laravel_database_queue_monitor.dashboard_route')?'text-blue-600':''}}"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Overview</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{config('laravel_database_queue_monitor.upcoming_jobs_route')}}"
                       class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800
                            {{'/'.request()->path() == config('laravel_database_queue_monitor.upcomong_jobs_route')?'border-green-500':'border-gray-800 hover:border-green-500'}}">
                        <i class="fa fa-bullseye pr-0 md:pr-3
                            {{'/'.request()->path() == config('laravel_database_queue_monitor.upcoming_jobs_route')?'text-green-600':''}}"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Upcoming Jobs</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{config('laravel_database_queue_monitor.failed_jobs_route')}}"
                       class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2
                            {{'/'.request()->path() == config('laravel_database_queue_monitor.failed_jobs_route')?'border-red-500':'border-gray-800 hover:border-red-500'}}">
                        <i class="fa fa-bullseye pr-0 md:pr-3
                            {{'/'.request()->path() == config('laravel_database_queue_monitor.failed_jobs_route')?'text-red-600':''}}"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Failed Jobs</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('body')
</div>
</body>

</html>