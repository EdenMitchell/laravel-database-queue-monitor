@extends('queue-monitor::layout')
@section('body')

    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="flex flex-wrap">

        </div>
        <div class="flex flex-row flex-wrap flex-grow mt-2">
            @include('queue-monitor::charts.failed_jobs')
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#failed-jobs-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection