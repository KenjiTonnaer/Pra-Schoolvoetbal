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
            <div class="flex items-center">
                <img src="{{ asset('img/SchoolvoetbalLogo.jpg') }}" alt="Schoolvoetbal Logo" class="h-20 w-auto">
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="/contact" class="hover:underline">Contact</a></li>
                    <li><a href="#" class="hover:underline">Gokken</a></li>
                    @auth
                        <!-- Profile Link -->
                        <li>
                            <a href="{{ route('profile.edit') }}" class="hover:underline">Profile</a>
                        </li>

                        <!-- Logout Button -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:underline">Log Out</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="font-semibold text-white hover:underline">Log in</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:underline">Register</a>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>



    <main>
        {{ $slot }}
    </main>


    <footer class="bg-[#009DE0] text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Schoolvoetbal.</p>
        </div>
    </footer>
</body>
</html>
