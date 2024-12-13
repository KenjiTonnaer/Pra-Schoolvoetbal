<x-base-layout>
    <h1 class="flex justify-center text-3xl pt-10">Teams overzicht</h1>

    <div class="container mx-auto grid grid-cols-3 gap-6 mt-10">
        <!-- Dropdown voor toernooien -->
        <div class="col-span-3">
            <form method="GET" action="{{ route('teams.index') }}" class="mb-6">
                <label for="tournament" class="block text-lg font-semibold mb-2">Kies een toernooi:</label>
                <select name="tournament" id="tournament" class="border rounded-lg w-full px-4 py-2">
                    <option value="">Selecteer een toernooi</option>
                    @foreach ($tournaments as $tournament)
                        <option value="{{ $tournament->id }}" {{ $selectedTournamentId == $tournament->id ? 'selected' : '' }}>
                            {{ $tournament->title }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white text-lg font-semibold py-2 px-6 rounded hover:bg-blue-600 mt-4">
                    Weergeven
                </button>
            </form>
        </div>

        <!-- Overzicht van teams -->
        <div class="col-span-2 bg-gray-200 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-4">Teams</h2>
            @if ($teams && count($teams) > 0)
                <ul class="list-disc pl-6">
                    @foreach ($teams as $team)
                        <li>{{ $team->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Geen teams gevonden voor dit toernooi.</p>
            @endif
        </div>

        <!-- Teambeheer -->
        <div class="bg-gray-200 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-4">Beheer je team</h2>
            @auth
                <p class="mb-4">Je bent ingelogd. Kies een team om te beheren.</p>
                @if ($teams && count($teams) > 0)
                    <ul class="list-disc pl-6">
                        @foreach ($teams as $team)
                            <li>
                                <a href="{{ route('teams.edit', $team->id) }}" class="text-blue-500 hover:text-blue-700">
                                    {{ $team->name }} - Beheren
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Er zijn geen teams om te beheren voor dit toernooi.</p>
                @endif
            @else
                <p class="mb-4">Log in om een team te beheren.</p>
                <a href="{{ route('login') }}" class="bg-blue-500 text-white text-lg font-semibold py-2 px-6 rounded hover:bg-blue-600">
                    Inloggen
                </a>
            @endauth
        </div>
    </div>
</x-base-layout>
