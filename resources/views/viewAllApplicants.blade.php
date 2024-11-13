<x-app-layout>
    <div class="mx-auto mt-20">
        <h1>Applicants:</h1>
        <section>
            <ul>
                @foreach($applicants as $applicant)
                    <li>
                        <span>{{$applicant->name}}</span>
                        <span>-</span>
                        <span>{{$applicant->id}}</span>
                    </li>
                    <span>
                        <a href="{{ route('viewAllJobs.applicantDetail', ['id' => $recruitmentId, 'applicantId' => $applicant->id]) }}">View Detail</a>
                    </span>

                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
