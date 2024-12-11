<x-app-layout>
    <div class="mx-10 my-20 max-w-4xl p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-5">Applicant Details</h1>

        <div class="mb-4">
            <p><strong>Name:</strong> {{ $applicant->applicant->name }}</p>
            <p><strong>Email:</strong> {{ $applicant->applicant->email }}</p>
            <p><strong>Phone Number:</strong> {{ $applicant->applicant->phone_number }}</p>
            <p><strong>Link:</strong> <a href="{{ $applicant->applicant->link }}" class="text-blue-500 underline">{{ $applicant->applicant->link }}</a></p>
        </div>
        <div class="flex gap-8">
            @if ($applicant->jobPosting->status->value != 'Ended')
                @if ($applicant->status != 'Accepted')
                    <form action="{{ route('recruitment.accept', ['id' => $recruitmentId, 'applicantId' => $applicant->applicant_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 w-20 bg-green-400 text-white rounded-md">
                            Accept
                        </button>
                    </form>
                @endif

                @if ($applicant->status != 'Rejected')
                    <form action="{{ route('recruitment.reject', ['id' => $recruitmentId, 'applicantId' => $applicant->applicant_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 w-20 bg-red-400 text-white rounded-md">
                            Reject
                        </button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
