<x-app-layout>
    <div class="mx-auto mt-20">
        <h1>Applicants:</h1>


        <section>
            <ul>
                @foreach($applicants as $applicant)
                    <li>
                        <span>{{$applicant->name}}</span>
                        <span>-</span>
                        <span>
                            <a>View Detail</a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
