<x-base-layout>
    <h1 class="flex justify-center text-3xl pt-10">Welkom bij het schoolvoetbal</h1>

    <div class="container mx-auto grid grid-cols-3 grid-rows-2 gap-4 mt-10 h-screen">
        <!-- Linksboven: Schema voetbaltoernooi -->
        <div class="col-span-2 row-span-2 bg-gray-100 rounded-lg shadow-lg p-8 overflow-auto">
            <h2 class="text-2xl font-bold mb-4">Schema voetbaltoernooi</h2>
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">Team</th>
                        <th class="border border-gray-400 px-4 py-2">Tijd</th>
                        <th class="border border-gray-400 px-4 py-2">Datum</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data uit database -->
                </tbody>
            </table>
        </div>

        <!-- Rechtsboven: Informatie over schoolvoetbal -->
        <div class="bg-yellow-100 rounded-lg shadow-lg p-8 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-bold">Informatie over het schoolvoetbal</h2>
                <p class="mt-4">Alle belangrijke informatie over het toernooi.</p>
            </div>
            <div class="mt-8 flex justify-center">
                <button class="bg-green-500 text-white text-lg font-semibold py-2 px-6 rounded hover:bg-green-600">
                    <a href="/inschrijven">Schrijf je in</a>
                </button>
            </div>
        </div>

</x-base-layout>
