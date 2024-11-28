<x-base-layout>
    <h1 class="flex justify-center text-3xl pt-10">Welkom bij het schoolvoetbal</h1>

    <div class="container mx-auto grid grid-cols-3 grid-rows-2 gap-4 mt-10 h-screen">
        <!-- Schema voetbaltoernooi -->
        <div class="col-span-2 row-span-2 bg-gray-200 rounded-lg shadow-lg p-8 overflow-auto">
            <h2 class="text-2xl font-bold mb-4">Schema voetbaltoernooi</h2>

            @if ($tournament)
                <p class="mb-4">Toernooi: <strong>{{ $tournament->title }}</strong></p>

                @if (count($schedule) > 0)
                    <table class="table-auto w-full border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">Team 1</th>
                                <th class="border border-gray-400 px-4 py-2">Score Team 1</th>
                                <th class="border border-gray-400 px-4 py-2">Team 2</th>
                                <th class="border border-gray-400 px-4 py-2">Score Team 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedule as $game)
                                <tr class="text-center">
                                    <td class="border border-gray-400 px-4 py-2">{{ $game['team_1'] }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $game['team_1_score'] }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $game['team_2'] }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $game['team_2_score'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">Er zijn nog geen wedstrijden ingepland.</p>
                    <a href="{{ route('generate.schedule', $tournament->id) }}" class="bg-blue-500 text-white text-lg font-semibold py-2 px-6 rounded hover:bg-blue-600">
                        Genereer wedstrijden
                    </a>
                @endif
            @else
                <p class="text-gray-500">Er is momenteel geen actief toernooi beschikbaar.</p>
            @endif
        </div>

        <!-- Informatie -->
        <div class="bg-gray-200 rounded-lg shadow-lg p-8 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-bold">Informatie over het schoolvoetbal</h2>
                <p class="mt-4">Alle belangrijke informatie over het toernooi.</p>
            </div>
            <div class="mt-8 flex justify-center">
                <button class="bg-blue-500 text-white text-lg font-semibold py-2 px-6 rounded hover:bg-blue-600">
                    <a href="/inschrijven">Schrijf je in</a>
                </button>
            </div>
        </div>
    </div>
</x-base-layout>
