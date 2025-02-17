<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
            <!-- Logo -->
            <div class="mb-8">
                <a href="/">
                    <img src="{{ asset('img/SchoolvoetbalLogoWit.jpg') }}" alt="Schoolvoetbal Logo" class="w-80 h-30">
                </a>
            </div>

            <!-- Form Container -->
            <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg rounded-lg border border-gray-200">
                <h2 class="text-center text-xl font-semibold text-[rgba(0,157,224,1)] mb-6">Welkom bij Schoolvoetbal</h2>
                {{ $slot }}
            </div>

            <!-- Footer -->
            <footer class="mt-6 text-gray-700 text-sm">
                <p>&copy; 2024 Schoolvoetbal Toernooi.</p>
            </footer>
        </div>
    </body>
</html>
