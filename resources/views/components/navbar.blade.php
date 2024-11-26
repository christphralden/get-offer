<nav style="background-color: black" class="fixed top-0 left-0 w-full h-20 z-50">
    <div class="container mx-auto flex justify-between items-center h-full p-4">
        <div class="flex flex-row gap-10">
            <!-- Logo/Brand name -->
            <a href="{{ route('home') }}" class="text-white hover:text-gray-400 font-bold">GetOffer</a>
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="text-white hover:text-gray-400">Home</a>
                @if (Auth::user() == null || Auth::user()->role === 'jobseeker')
                    <a href="{{ route('jobs.view') }}" class="text-white hover:text-gray-400">Find Jobs</a>
                    <a href="{{ route('jobs.applied') }}" class="text-white hover:text-gray-400">Your Jobs</a>
                @elseif (Auth::user()->role === 'recruiter')
                    <a href="{{ route('jobs.view') }}" class="text-white hover:text-gray-400">View All Jobs</a>
                    <a href="{{ route('recruitment.view') }}" class="text-white hover:text-gray-400">Your Recruitment</a>
                @endif
                <a href="{{ route('contact') }}" class="text-white hover:text-gray-400">Contact Us</a>
                <a href="{{ route('about') }}" class="text-white hover:text-gray-400">About Us</a>
            </div>
        </div>
        <div class="flex flex-row gap-10">
            <div>
                @auth
                <div class="flex flex-row text-white justify-center items-center gap-5">
                    <a href="{{ route('editProfile.view') }}">Hi, {{ Auth::user()->name }}</a>
                </div>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-400">Login</a>
                @endauth
            </div>
            <!-- Hamburger Button -->
            <div class="md:hidden">
                <button id="hamburger" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Authentication Links -->

    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
        <a href="{{ route('home') }}" class="block text-white hover:text-gray-400 px-4 py-2">Home</a>
        @if (Auth::user() == null || Auth::user()->role === 'jobseeker')
            <a href="#" class="text-white hover:text-gray-400 px-4 py-2">Find Jobs</a>
        @elseif (Auth::user()->role === 'recruiter')
            <a href="#" class="text-white hover:text-gray-400">View Jobs</a>
            <a href="#" class="text-white hover:text-gray-400 px-4 py-2">Post Jobs</a>
        @endif
        <a href="{{ route('contact') }}" class="block text-white hover:text-gray-400 px-4 py-2">Contact Us</a>
        <a href="{{ route('about') }}" class="block text-white hover:text-gray-400 px-4 py-2">About Us</a>
    </div>
</nav>

<!-- Script for Hamburger Menu -->
<script>
    document.getElementById('hamburger').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden'); // Toggles the 'hidden' class
    });
</script>
