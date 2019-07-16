<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <div class="bg-red-100 border-b-4 border-red-500 rounded-lg shadow-lg p-5">
        <div class="flex flex-row items-center">
            <div class="flex-1 md:text-center">
                <h5 class="font-bold uppercase text-gray-600">Failed Jobs (last 24 hours)</h5>
                <h3 class="font-bold text-3xl">
                    <span id="failed-jobs-count">
                        {{$recently_failed_jobs_count}}
                    </span>
                    <span class="text-red-500"><i class="fas fa-caret-down"></i></span></h3>
            </div>
        </div>
    </div>
</div>