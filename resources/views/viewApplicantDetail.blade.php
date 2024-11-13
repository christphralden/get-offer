<x-app-layout>
    <div class="mx-auto mt-10 max-w-4xl p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-5">Applicant Details</h1>

        <div class="mb-4">
            <p><strong>Name:</strong> {{ $applicant->name }}</p>
            <p><strong>Email:</strong> {{ $applicant->email }}</p>
            <p><strong>Phone Number:</strong> {{ $applicant->phoneNumber }}</p>
            <p><strong>Link:</strong> <a href="{{ $applicant->link }}" class="text-blue-500 underline">{{ $applicant->link }}</a></p>
        </div>

        <div>
            <h2 class="text-lg font-semibold mt-4">Previous Jobs:</h2>
            <ul class="list-disc list-inside">
                @foreach (json_decode($applicant->jobs, true) as $job)
                    <li>{{ $job }}</li>
                @endforeach
            </ul>
        </div>

        <div class="flex gap-8">
            <button class="px-4 py-2 w-20 bg-green-400 rounded-md">Accept</button>
            <button class="px-4 py-2 w-20 bg-red-400 rounded-md">Reject</button>
        </div>
    </div>
</x-app-layout>
