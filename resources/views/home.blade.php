<x-app-layout>
    <div class="mx-auto">
        // isi home page disini
        // header image
        <div class="relative w-full h-full">
            <img src="{{ asset('storage/images/header image.jpeg') }}" alt="header image" class="w-full h-auto object-cover">
            <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-3xl font-bold">
                <span class="text-7xl">Looking for a job</span>
                <button class="bg-black py-2 px-4 rounded-lg my-5 text-2xl">Find Jobs Now</button>
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
