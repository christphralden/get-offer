<x-app-layout>
    <div class="mx-10 my-20">
        @if (Auth::user() == null)
            <div class="absolute flex flex-col justify-center items-center w-full h-full text-black gap-5">
                <div class="absolute w-full h-full bg-white opacity-50 pointer-events-none"></div> <!-- Add pointer-events-none -->
                <p class="text-4xl font-bold relative z-10">Login to see this page</p> <!-- Add relative and z-10 to ensure it's above the overlay -->
                <a href="{{ route('login') }}" class="text-white bg-black text-xl rounded-lg p-3 relative z-10">Login</a> <!-- Add relative and z-10 -->
            </div>
        @endif
        @auth
            <h1 class="text-3xl font-bold mb-5 mt-10">Your Accepted Jobs</h1>
            <div class="flex space-y-4 w-full gap-10">
                @forelse ($acceptedJobs as $job)
                <x-your-job-card :job="$job" />
                @empty
                    <p>No jobs found that you've applied for.</p>
                @endforelse
            </div>

            <h1 class="text-3xl font-bold mb-5 mt-10">Your Pending Jobs</h1>
            <div class="space-y-4 w-full gap-10">
                @forelse ($pendingJobs as $job)
                <x-your-job-card :job="$job" />
                @empty
                    <p>No jobs found that you've applied for.</p>
                @endforelse
            </div>

            <h1 class="text-3xl font-bold mb-5 mt-10">Job History</h1>
            <div class="space-y-4 w-full gap-10">
                @forelse ($jobHistory as $job)
                <x-your-job-card :job="$job" />
                @empty
                    <p>No jobs found that you've applied for.</p>
                @endforelse
            </div>
        @endauth
    </div>
</x-app-layout>
