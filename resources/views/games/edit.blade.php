<x-base-layout>
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6">Wedstrijd aanpassen</h2>

        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="team_1_score" class="form-label">Score voor {{ $game->team1->name }}</label>
                <input type="number" name="team_1_score" id="team_1_score"
                       value="{{ old('team_1_score', $game->team_1_score) }}"
                       class="border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="team_2_score" class="form-label">Score voor {{ $game->team2->name }}</label>
                <input type="number" name="team_2_score" id="team_2_score"
                       value="{{ old('team_2_score', $game->team_2_score) }}"
                       class="border-gray-300 rounded w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Opslaan
            </button>
        </form>
    </div>
</x-base-layout>
