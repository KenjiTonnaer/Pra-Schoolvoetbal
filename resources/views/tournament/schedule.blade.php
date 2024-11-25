<x-base-layout>
<main class="p-8">
    <div class="container mx-auto grid grid-cols-3 grid-rows-2 gap-4 mt-10 h-screen">
        <!-- Linksboven: Schema voetbaltoernooi -->
        <div class="col-span-2 row-span-2 bg-gray-100 rounded-lg shadow-lg p-8 overflow-auto">
            <h2 class="text-2xl font-bold mb-4">Schema voetbaltoernooi</h2>

            @if ($tournament)
                <p class="mb-4">Toernooi: <strong>{{ $tournament->title }}</strong></p>

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
                <p class="text-gray-500">Er is momenteel geen actief toernooi beschikbaar.</p>
            @endif
        </div>
</main>
</x-base-layout>
