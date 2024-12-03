<x-base-layout>
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">Teams Beheren</h2>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-gray-600 font-medium border-b">Teamnaam</th>
                        <th class="px-6 py-3 text-gray-600 font-medium border-b">Spelers</th>
                        <th class="px-6 py-3 text-gray-600 font-medium border-b">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b">{{ $team->name }}</td>
                            <td class="px-6 py-4 border-b">
                                @if($team->players)
                                    <ul class="list-disc pl-5">
                                        @foreach(json_decode($team->players) as $player)
                                            <li>{{ $player }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500">Geen spelers</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 border-b">
                                <form method="POST" action="{{ route('admin.team.delete', $team->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Weet je zeker dat je dit team wilt verwijderen?')"
                                        class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                                        Verwijderen
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
