<x-base-layout>
<main class="p-8">
    <h1 class="text-3xl font-bold mb-8">Schema voor {{ $tournament->title }}</h1>

    <table class="table-auto w-full bg-white border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Team 1</th>
                <th class="border border-gray-300 px-4 py-2">Team 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matches as $match)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $match['team1'] }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $match['team2'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
</x-base-layout>
