<x-app-layout>
    <div class="mx-10 my-20">
        <div class="flex w-full my-10 justify-center items-center">
            <a href="{{ route('addRecruitment.create') }}" class="bg-black rounded-lg p-3 text-white text-2xl font-bold">+ Create New Recruitment</a>
        </div>
        <h1 class="text-3xl font-bold mt-10">On Going Recruitment</h1>
        <div class="space-y-4 w-full mt-5">
            @forelse ($ongoingJobPosting as $jobPosting)
                <x-job-posting-card :jobPosting="$jobPosting" />
            @empty
                <p>No jobs found.</p>
            @endforelse
        </div>
        <h1 class="text-3xl font-bold mt-10">Recruitment History</h1>
        <div class="space-y-4 w-full mt-5">
            @forelse ($historyJobPosting as $jobPosting)
                <x-job-posting-card :jobPosting="$jobPosting" />
            @empty
                <p>No jobs found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
