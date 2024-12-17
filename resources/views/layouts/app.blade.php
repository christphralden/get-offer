<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>{{ config('app.name', 'GetOffer') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen w-full bg-gray-100">
            @include('components.navbar')
            <main class="flex flex-col w-full">
                {{ $slot }}
            </main>
        </div>
        <footer style="background-color: black" class="w-full h-48 flex flex-col items-center justify-center text-white text-center">
            <div class="flex w-full items-center justify-center">
                <a href="{{ route('home') }}" class="mx-4 hover:text-gray-400">Home</a>
                @if (Auth::user() == null || Auth::user()->role === 'jobseeker')
                    <a href="{{ route('jobs.view') }}" class="text-white hover:text-gray-400">Find Jobs</a>
                @elseif (Auth::user()->role === 'recruiter')
                    <a href="{{ route('jobs.view') }}" class="text-white hover:text-gray-400 mx-4">View Jobs</a>
                    <a href="{{ route('recruitment.view') }}" class="text-white hover:text-gray-400 mx-4">Post Jobs</a>
                @endif
                <a href="{{ route('contact') }}" class="mx-4 hover:text-gray-400">Contact Us</a>
                <a href="{{ route('about') }}" class="mx-4 hover:text-gray-400">About Us</a>
            </div>
            <p class="mt-2">© {{ date('Y') }} GetOffer. All rights reserved.</p>
        </footer>
    </body>
</html>
