<x-base-layout>
    <h1 class="flex justify-center text-3xl pt-10 pb-10">contact pagina</h1>
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
    <div class="bg-gray-200 rounded-lg shadow-lg p-8 flex flex-col justify-center items-center max-w-md mx-auto">
        <div class="text-center">
            <h2 class="text-2xl font-bold">Contact informatie</h2>
            <p class="mt-4">E-mail: test@example.com</p>
            <p class="mt-4">Telefoonnummer: +31 123 456 7890</p>
            <p class="mt-4">Adres: Teststraat 123, 1234 AB, Testland</p>
        </div>
    </div>

@endauth
</x-base-layout>
