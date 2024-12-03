<x-base-layout>
    <main class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1 class="text-3xl font-bold mb-8">Inschrijven</h1>

        <!-- Formulier -->
        <form method="POST" action="{{ route('registration.form') }}" class="w-full max-w-md">
            @csrf

            <!-- Naam speler -->
            <div class="mb-6">
                <label for="player_name" class="block text-lg font-medium mb-2">Naam speler</label>
                <input type="text" id="player_name" name="player_name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Nieuw team -->
            <div class="mb-6">
                <label for="team_name" class="block text-lg font-medium mb-2">Nieuw team naam</label>
                <input type="text" id="team_name" name="team_name" placeholder="Laat leeg als je een team selecteert"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Selecteer bestaand team -->
            <div class="mb-6">
                <label for="team_id" class="block text-lg font-medium mb-2">Selecteer team</label>
                <select id="team_id" name="team_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Kies een team --</option>
                    @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selecteer toernooi -->
            <div class="mb-6">
                <label for="tournament_id" class="block text-lg font-medium mb-2">Selecteer toernooi</label>
                <select id="tournament_id" name="tournament_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Kies een toernooi --</option>
                    @foreach ($tournaments as $tournament)
                    <option value="{{ $tournament->id }}">{{ $tournament->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit knop -->
            <button type="submit"
                class="w-full px-6 py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition">
                Inschrijven
            </button>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

        </form>
    </main>

</x-base-layout>
