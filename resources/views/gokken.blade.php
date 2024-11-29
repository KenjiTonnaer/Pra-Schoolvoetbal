<x-base-layout>
    <h1 class="flex justify-center text-3xl pt-10 pb-10">gok pagina</h1>
@guest
    <div class="bg-gray-200 rounded-lg shadow-lg my-8 p-8 flex flex-col justify-center items-center max-w-md mx-auto">
        <div class="text-center">
            <a class="bg-blue-500  text-white text-lg font-semibold py-2 px-6 rounded hover:bg-blue-600" href="{{ route('login') }}" class="hover:underline">inloggen</a>
            <a class="bg-blue-500  text-white text-lg font-semibold py-2 px-6 rounded hover:bg-blue-600" href="{{ route('register') }}" class="hover:underline">Registreren</a>


            <p class="mt-4">Je moet eerst inloggen of een nieuw acount aanmaken voordat je deze pagina kunt gebruiken</p>
        </div>
    </div>
@endguest
@auth
<h2>gokken maar!</h2>
@endauth
</x-base-layout>
