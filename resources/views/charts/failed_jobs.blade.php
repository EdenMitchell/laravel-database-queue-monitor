<div class="w-full p-3 mx-auto">
    <div class="bg-white border-transparent rounded-lg shadow-lg">
        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
            <h5 class="font-bold uppercase text-gray-600">Failed Jobs {{isset($dashboard)?'(Last 24 hours)':'(Last month)'}}</h5>
        </div>
        <div class="w-full">
            <div class="bg-white shadow-md rounded">
                <table id="failed-jobs-table" class="text-left w-full border-collapse">
                    <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Time
                    </th>
                    </thead>
                    <tbody>
                    @forelse($failed_jobs as $job)
                        <tr class="hover:bg-grey-lighter">
                            <td class="break-all py-4 px-6 border-b border-grey-light">
                                <strong><a href="{{config('laravel_database_queue_monitor.failed_job_route') . $job->id}}">{{json_decode($job->payload)->displayName}}</a></strong><br>
                                {{\Illuminate\Support\Str::limit($job->exception,50)}}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{\Carbon\Carbon::parse($job->failed_at)->format('H:i:s - jS F')}}
                                ({{config('laravel_database_queue_monitor.database_timezone')}})<br>
                                {{\Carbon\Carbon::parse($job->failed_at)->diffForHumans()}}
                            </td>
                        </tr>
                    @empty
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                <strong><i class="em em-beers"></i> No failed jobs to show <i class="em em-beers"></i></strong>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
