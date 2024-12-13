<x-base-layout>
    <h1 class="flex justify-center text-3xl pt-10">Team bewerken: {{ $team->name }}</h1>

    <div class="container mx-auto mt-10">
        <form action="{{ route('teams.update', $team->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT') <!-- Dit zorgt ervoor dat het formulier een PUT request stuurt voor een update -->

            <div class="mb-4">
                <label for="name" class="block text-lg font-semibold mb-2">Teamnaam</label>
                <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" class="border rounded-lg w-full px-4 py-2" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-semibold mb-2">Beschrijving</label>
                <textarea name="description" id="description" class="border rounded-lg w-full px-4 py-2" rows="4">{{ old('description', $team->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded hover:bg-blue-600">
                Opslaan
            </button>
        </form>
    </div>
</x-base-layout>
