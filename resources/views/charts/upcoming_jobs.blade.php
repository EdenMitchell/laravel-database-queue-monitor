<div class="w-full p-3 mx-auto">
    <div class="bg-white border-transparent rounded-lg shadow-lg">
        <div class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
            <h5 class="font-bold uppercase text-gray-600">Upcoming Jobs</h5>
        </div>

        <div class="w-full">
            <div class="bg-white shadow-md rounded">
                <table id="upcoming-jobs-table" class="text-left w-full border-collapse">
                    <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Time
                    </th>
                    </thead>
                    <tbody>
                    @forelse($upcoming_jobs as $job)
                        <tr class="hover:bg-grey-lighter">
                            <td class="break-all py-2 md:py-4 px-2 md:px-6 border-b border-grey-light">
                                <strong>{{json_decode($job->payload)->displayName}}</strong>
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{\Carbon\Carbon::createFromTimestamp($job->available_at)->format('H:i:s - jS F')}}
                                ({{config('laravel_database_queue_monitor.database_timezone')}})
                            </td>
                        </tr>
                    @empty
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                <strong>No upcoming jobs to show.</strong>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>