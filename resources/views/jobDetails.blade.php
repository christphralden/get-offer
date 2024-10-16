<x-app-layout>
    <div class="mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-5">{{ $recruitment->jobDetail['position'] }}</h1>
        <p><strong>Location:</strong> {{ $recruitment->jobDetail['place'] }}</p>
        <p><strong>Shift:</strong> {{ $recruitment->jobDetail['shift'] }}</p>
        <p><strong>Salary:</strong> {{ $recruitment->jobDetail['salary'] }}</p>
        <p><strong>Description:</strong> {{ $recruitment->jobDesc }}</p>
        <p><strong>Status:</strong> {{ $recruitment->status }}</p>
        <p><strong>End Date:</strong> {{ $recruitment->end_date }}</p>

        <p><strong>Requirements:</strong></p>
        <ul class="list-disc list-inside mb-4">
            @foreach ($recruitment->requirement as $requirement)
                <li>{{ $requirement }}</li>
            @endforeach
        </ul>

        <p><strong>Criteria:</strong></p>
        <ul class="list-disc list-inside mb-4">
            @foreach ($recruitment->criteria as $criteria)
                <li>{{ $criteria }}</li>
            @endforeach
        </ul>

        <p><strong>Applicants:</strong> {{ count(array_filter($recruitment->applicants)) }}</p>

        @if (Auth::user() == null || Auth::user()->role === 'jobseeker')
            <form action="{{ route('applyJob', $recruitment->id) }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-500">
                    {{ in_array(auth()->id(), $recruitment->applicants) ? 'Unapply' : 'Apply this job' }}
                </button>
            </form>
        @endif
    </div>
</x-app-layout>
