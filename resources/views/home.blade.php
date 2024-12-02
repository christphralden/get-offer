<x-app-layout>
    <div class="my-20">
        <div class="flex w-full h-[100vh] justify-center items-center text-center">
            <div class="inset-0 flex flex-col items-center justify-center text-white text-3xl font-bold z-20">
                @if (Auth::user() == null || Auth::user()->role === 'jobseeker')
                    <span class="text-5xl">Looking for a Job?</span>
                    <button class="bg-black py-2 px-4 rounded-lg my-5 text-2xl">
                        <a href="{{ route('jobs.view') }}">Find Jobs Now</a>
                    </button>
                @elseif (Auth::user()->role === 'recruiter')
                    <span class="text-5xl">Post Jobs and Find Candidates</span>
                    <button class="bg-black py-2 px-4 rounded-lg my-5 text-2xl">
                    <a href="{{ route('recruitment.view') }}">Post Jobs Now</a>
                    </button>
                @endif
            </div>
            <div class="absolute w-full h-full bg-black z-10 opacity-70"></div>
            <img src="{{ asset('asset/header-image.jpg') }}" alt="header image" class="absolute w-full h-full object-cover">
        </div>
        <div class="flex w-full h-96 my-10">
            <div class="flex flex-col w-full mx-10">
                <span class="text-3xl font-bold mb-10">Recruitment Analytics</span>
                <div class="flex flex-row h-full w-full items-end justify-center gap-10 border-l-4 border-b-4">
                
                    <!-- Check if there is at least 1 recruiter -->
                    @if ($jobs->count() >= 1)
                        <div class="flex flex-col w-[25%] h-[100%] bg-black text-white justify-center items-center text-center">
                            <span class="mt-2 text-1xl font-bold">Top #1 Job</span>
                            <p class="text-2xl mt-2">{{ $jobs[0]->position }}</p>
                            <p>{{ $jobs[0]->total_applicants}} Applicants</p>
                        </div>
                    @endif

                    <!-- Check if there is at least 2 recruiters -->
                    @if ($jobs->count() >= 2)
                        <div class="flex flex-col w-[25%] h-[75%] bg-black text-white justify-center items-center text-center">
                            <span class="mt-2 text-1xl font-bold">Top #2 Job</span>
                            <p class="text-2xl mt-2">{{ $jobs[1]->position }}</p>
                            <p>{{ $jobs[1]->total_applicants}} Applicants</p>
                        </div>
                    @endif

                    <!-- Check if there is at least 3 recruiters -->
                    @if ($jobs->count() >= 3)
                        <div class="flex flex-col w-[25%] h-[50%] bg-black text-white justify-center items-center text-center">
                            <span class="mt-2 text-1xl font-bold">Top #3 Job</span>
                            <p class="text-2xl mt-2">{{ $jobs[2]->position }}</p>
                            <p>{{ $jobs[2]->total_applicants}} Applicants</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        
        <div class="flex w-full h-96 my-10">
            <div class="flex flex-col w-full mx-10">
                
                
                <div class="container flex gap-32  justify-between h-full">
                    
                    <div class="w-full lg:w-1/2">
                        <span class="text-3xl font-bold mb-20">About us</span>

                        <h1 class="text-2xl mt-5  font-extrabold text-800 leading-tight mb-4">
                            Connecting Talent & Providing Opportunities
                        </h1>

                        <p class="text-sm mb-4 ">
                            At GetOffer, we understand that success begins with the right connections. Our platform is designed to empower individuals by providing easy access to meaningful job opportunities while helping employers find the talent they need to grow. 
                        </p>

                        <button class="bg-black py-2 px-4 rounded-lg my-5 text-2xl text-white">
                            <a href="{{ route('about') }}">Learn More</a>
                        </button>
                        
                    </div>

                    <div class="w-1/2 p-4 h-full items-center justify-center hidden lg:block">
                        <img  src="{{asset('asset/about-partner-image.avif')}}" alt="about-mission" class="rounded-lg w-full min-h-[500] h-full object-cover">
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


