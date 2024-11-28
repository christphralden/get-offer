<div class="flex items-center justify-center flex-row p-3 w-full border-b-4 border-r-4 border-l-2 border-t-2 rounded-lg">
    <div class="flex w-full gap-10">
        <span>{{ $index }}</span>
        <span>{{ $applicant->applicant->name }}</span>
    </div>
    <div class="flex w-full justify-end">                
        <a href="{{ route('recruitment.applicant', ['id' => $recruitmentId, 'applicantId' => $applicant->applicant_id]) }}" class="bg-black text-white px-4 py-2 mt-2 rounded">View Detail</a>
    </div>
</div>