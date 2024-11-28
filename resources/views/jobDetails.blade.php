<x-app-layout>
    <div class="mx-10 my-20">
        <div class="max-w-4xl p-6 bg-white shadow-md rounded-lg mt-10">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-6">{{ $jobPosting->position }}</h1>

            <div class="space-y-4">
                <p class="text-lg text-gray-600">
                    <span class="font-semibold text-gray-800">Location:</span> {{ $jobPosting->place }}
                </p>
                <p class="text-lg text-gray-600">
                    <span class="font-semibold text-gray-800">Salary:</span> IDR {{ number_format($jobPosting->salary) }}
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
                @if (Auth::user() != null || Auth::user()->role === 'jobseeker')
                    @if ($jobPosting->status->value != 'Ended')
                        <form action="{{ route('job.apply', $jobPosting->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-md bg-blue-500 text-white font-semibold hover:bg-blue-600 transition">
                                {{ $applicationStatus ? 'Unapply' : 'Apply for this Job' }}
                            </button>
                        </form> 
                    @else

                        @if ($jobPosting->applicant != null && $jobPosting->applicant->status == 'Accepted')
                            <p class="text-green-500">Congratulations, you have been accepted for this job. Please wait for the recruiter to reach out to you!</p>
                        @elseif ($jobPosting->applicant != null && $jobPosting->applicant->status == 'Rejected')
                            <p class="text-red-500">Sorry, you have been rejected for this job</p>
                        @endif
                        


                    @endif
                @endif

                @if ($isRecruiter)
                    <a href="{{ route('recruitment.details', $jobPosting->id) }}" class="px-4 py-2 rounded-md bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 transition">
                        Go to recruitment
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
