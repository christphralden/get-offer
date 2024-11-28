<x-app-layout>
    <div class="mx-10 my-20">
        <button class="mt-10">
            <a href="{{ route('recruitment.details', $recruitmentId) }}">Go Back</a>
        </button>
        <h1 class="text-4xl my-10 font-bold">Pending Applicants</h1>
        <section>
            <ul>
                @forelse($pendingApplicants as $applicant)
                   <x-applicant-card :applicant="$applicant" :recruitmentId="$recruitmentId" :index="$loop->iteration"/>
                @empty
                    <div>
                        <h1>You have no pending applicants at this moment</h1>
                    </div>
                @endforelse
            </ul>
        </section>

        <h1 class="text-4xl my-10 font-bold">Accepted Applicants</h1>
        <section>
            <ul>
                @forelse($acceptedApplicants as $applicant)
                   <x-applicant-card :applicant="$applicant" :recruitmentId="$recruitmentId" :index="$loop->iteration"/>
                @empty
                    <div>
                        <h1>You have not accepted any applicants at this moment</h1>
                    </div>
                @endforelse
            </ul>
        </section>

        <h1 class="text-4xl my-10 font-bold">Rejected Applicants</h1>
        <section>
            <ul>
                @forelse($rejectedApplicants as $applicant)
                   <x-applicant-card :applicant="$applicant" :recruitmentId="$recruitmentId" :index="$loop->iteration"/>
                @empty
                    <div>
                        <h1>You have not rejected any applicants at this moment</h1>
                    </div>
                @endforelse
            </ul>
        </section>
    </div>
</x-app-layout>
