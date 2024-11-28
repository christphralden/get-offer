<div class="flex flex-row w-full border-b-4 border-r-4 border-l-2 border-t-2 rounded-lg">
    <div class="flex flex-col w-full p-4">
        <p class="text-xl font-semibold">{{ $job->position }}</p>
        <p><strong>Location:</strong> {{ $job->place }}</p>
        <p><strong>Salary:</strong> IDR {{ number_format($job->salary) }}</p>
    </div>

    <div class="flex flex-col w-full p-4 justify-end items-end">
        <p class="{{ $job->applicant->status === 'Rejected' ? 'text-red-500' : 'text-green-500' }}">
            {{ $job->applicant->status }}
        </p>
        <p><strong>{{ $job->recruiter->name }}</strong></p>

        <!-- View Details button -->
        <a href="{{ route('job.details', $job->id) }}" class="bg-black text-white px-4 py-2 mt-2 rounded">
            View Details
        </a>

        @if ($job->status->value != 'Ended')
            <!-- Unapply button -->
            <form action="{{ route('job.unapply', $job->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-2 rounded">
                    Unapply
                </button>
            </form>
        @endif

        
    </div>
</div>