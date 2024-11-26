<x-app-layout>
    <div class="container mx-auto mt-10 max-w-4xl p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">{{ $jobPosting->position }}</h1>

        <div class="space-y-4">
            <p class="text-lg text-gray-600">
                <span class="font-semibold text-gray-800">Location:</span> {{ $jobPosting->place }}
            </p>
            <p class="text-lg text-gray-600">
                <span class="font-semibold text-gray-800">Salary:</span> ${{ number_format($jobPosting->salary) }}
            </p>
            <p class="text-lg text-gray-600">
                <span class="font-semibold text-gray-800">Description:</span> {{ $jobPosting->description }}
            </p>
            <p class="text-lg text-gray-600">
                <span class="font-semibold text-gray-800">Status:</span>
                <span class="px-2 py-1 rounded-full text-sm font-medium {{ $jobPosting->status === \App\Enums\RecruitmentStatus::ONGOING ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $jobPosting->status }}
                </span>
            </p>
            <p class="text-lg text-gray-600">
                <span class="font-semibold text-gray-800">End Date:</span> {{ $jobPosting->end_date }}
            </p>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Requirements</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-1">
                @foreach ($jobPosting->requirement as $requirement)
                    <li>{{ $requirement }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Criteria</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-1">
                @foreach ($jobPosting->criteria as $criteria)
                    <li>{{ $criteria }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <p class="text-lg text-gray-600">
                <span class="font-semibold text-gray-800">Applicants:</span> {{ count($jobPosting->applicants) }}
            </p>
        </div>

        <div class="mt-6 space-y-4">
            @if ($isRecruiter)
                <a href="{{ route('recruitment.applicants', $jobPosting->id) }}" class="px-4 py-2 rounded-md bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 transition">
                    View All Applicants
                </a>

                @if ($jobPosting->status === \App\Enums\RecruitmentStatus::ONGOING)
                    <form action="{{ route('recruitment.end', $jobPosting->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-md bg-red-500 text-white font-semibold hover:bg-red-600 transition"
                                onclick="return confirm('Are you sure you want to end this recruitment?');">
                            End Recruitment
                        </button>
                    </form>
                @elseif ($jobPosting->status === \App\Enums\RecruitmentStatus::ENDED)
                    <div class="text-red-600 font-medium">Job recruitment has ended</div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
