<x-app-layout>
    @if (Auth::user() == null)
        <div class="absolute flex flex-col justify-center items-center w-full h-full bg-white gap-5">
            <div class="absolute w-full h-full bg-white opacity-80 pointer-events-none"></div>
            <p class="text-4xl font-bold relative z-10">Please login to see this page</p>
            <a href="{{ route('login') }}" class="text-white bg-black text-xl rounded-lg p-3 relative z-10">Login</a> 
        </div>
    @endif
    <div class="mx-10 my-20">
        <h1 class="text-3xl font-bold mb-5 mt-10">All Job Listings</h1>
        <div class="space-y-4 w-full">
            @forelse ($jobPostings as $jobPosting)
                <x-job-card :jobPosting="$jobPosting" />
            @empty
                <p>No jobs found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
