<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Schoolvoetbal</title>
</head>
<body class="bg-gray-100 text-gray-800">

    <header class="bg-[#009DE0] text-white py-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between px-4">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('img/SchoolvoetbalLogo.jpg') }}" alt="Schoolvoetbal Logo" class="h-16 w-auto">
            </div>

            <!-- Navigation Links -->
            <nav class="absolute left-1/2 transform -translate-x-1/2">
                <ul class="flex space-x-8 text-lg font-semibold">
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="/contact" class="hover:underline">Contact</a></li>
                    <li> @if (auth()->user() && auth()->user()->is_Admin())
                            <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                        @endif
                    </li>
                </ul>
            </nav>

            <!-- Authentication/Account Links -->
            <div class="flex items-center space-x-6 text-lg font-semibold">
                @auth
                    <a href="{{ route('profile.edit') }}" class="hover:underline">Account beheren</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Uitloggen</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="hover:underline">Inloggen</a>
                    <a href="{{ route('register') }}" class="hover:underline">Registreren</a>
                @endguest
            </div>
        </div>
    </header>





    <main>
        {{ $slot }}
    </main>


    <footer class="bg-[#009DE0] text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Schoolvoetbal. Kenji, Diégo, Youssef</p>
        </div>
    </footer>
</body>
</html>
