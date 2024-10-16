<div class="flex flex-row w-full">
    <div class="flex flex-col w-full bg-gray-500 p-4">
        <p class="text-xl font-semibold">{{ $recruitment->jobDetail['position'] }}</p>
        
        <!-- Display requirements as a list -->
        <p><strong>Requirements:</strong></p>
        <ul class="list-disc list-inside">
            @foreach (array_slice($recruitment->requirement, 0, 2) as $requirement)
                <li>{{ $requirement }}</li>
            @endforeach
        </ul>
        @if (count($recruitment->requirement) > 2)
            <p>...</p> <!-- Move "..." outside the list -->
        @endif
        
        <!-- Display criteria as a list -->
        <p><strong>Criteria:</strong></p>
        <ul class="list-disc list-inside">
            @foreach (array_slice($recruitment->criteria, 0, 2) as $criteria)
                <li>{{ $criteria }}</li>
            @endforeach
        </ul>
        @if (count($recruitment->criteria) > 2)
            <p>...</p> <!-- Display "..." if more than 2 -->
        @endif
    </div>

    <div class="flex flex-col w-full bg-gray-600 p-4 justify-end items-end">
        <p class="font-semibold">Recruiter</p>
        <p>{{ $recruitment->user->name }}</p>
        
        <div class="flex flex-col justify-end mt-10">
            <p><strong>Salary:</strong> {{ $recruitment->jobDetail['salary'] }}</p>
            <a href="{{ route('viewAllJobs.details', $recruitment->id) }}" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
                View Details
            </a>
        </div>
    </div>
</div>
