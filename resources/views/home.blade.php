<x-app-layout>
    <div class="mx-auto mt-20">
        <div class="relative w-full h-full">
            <img src="{{ asset('storage/images/header-image.jpeg') }}" alt="header image" class="w-full h-auto object-cover">
            <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-3xl font-bold">
                @if (Auth::user() == null || Auth::user()->role === 'jobseeker')
                    <span class="text-7xl">Looking for a Job?</span>
                    <button class="bg-black py-2 px-4 rounded-lg my-5 text-2xl">Find Jobs Now</button>
                @elseif (Auth::user()->role === 'recruiter')
                    <span class="text-7xl">Post Jobs and Find Candidates</span>
                    <button class="bg-black py-2 px-4 rounded-lg my-5 text-2xl">Post Jobs Now</button>
                @endif
            </div>
        </div>
        <div class="bg-gray-400 w-full h-96">
            Recruitment analytics
        </div>
        
        <div class="bg-gray-500 w-full h-96">
            About us section
        </div>
    </div>
</x-app-layout>


