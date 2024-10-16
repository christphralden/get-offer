<x-app-layout>
    <div class="mx-auto mt-20">
        @if (Auth::user() == null)
            <div class="absolute flex flex-col justify-center items-center w-full h-full text-black gap-5">
                <div class="absolute w-full h-full bg-white opacity-50 pointer-events-none"></div> <!-- Add pointer-events-none -->
                <p class="text-4xl font-bold relative z-10">Login to see this page</p> <!-- Add relative and z-10 to ensure it's above the overlay -->
                <a href="{{ route('login') }}" class="text-white bg-black text-xl rounded-lg p-3 relative z-10">Login</a> <!-- Add relative and z-10 -->
            </div>
        @endif
        @auth
        <h1 class="text-3xl font-bold mb-5">Jobs You've Applied For</h1>
        <div class="space-y-4 w-full">
            @forelse ($appliedJobs as $job)
                <div class="flex flex-row w-full">
                    <div class="flex flex-col w-full bg-gray-500 p-4">
                        <p class="text-xl font-semibold">{{ $job->jobDetail['position'] }}</p>
                        <p><strong>Location:</strong> {{ $job->jobDetail['place'] }}</p>
                        <p><strong>Salary:</strong> {{ $job->jobDetail['salary'] }}</p>
                    </div>

                    <div class="flex flex-col w-full bg-gray-600 p-4 justify-end items-end">
                        <p class="font-semibold">Recruiter</p>
                        <p>{{ $job->user->name }}</p>

                        <!-- View Details button -->
                        <a href="{{ route('viewAllJobs.details', $job->id) }}" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
                            View Details
                        </a>

                        <!-- Unapply button -->
                        <form action="{{ route('jobs.unapply', $job->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-2 rounded">
                                Unapply
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No jobs found that you've applied for.</p>
            @endforelse
        </div>
        @endauth
    </div>
</x-app-layout>
