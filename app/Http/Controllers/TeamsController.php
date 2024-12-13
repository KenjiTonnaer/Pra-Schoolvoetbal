<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Team;

class TeamsController extends Controller
{
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        // Valideer de input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Werk de teamgegevens bij
        $team->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redirect naar de teamoverzichtspagina met een succesmelding
        return redirect()->route('teams.index')->with('success', 'Team succesvol bijgewerkt!');
    }
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team')); // Verwijs naar edit.blade.php
    }
    public function index(Request $request)
{
    $selectedTournamentId = $request->input('tournament');

    if ($selectedTournamentId) {
        // Haal teams op voor het geselecteerde toernooi
        $tournament = Tournament::findOrFail($selectedTournamentId);
        $teams = $tournament->teams; // Teams voor dit toernooi
    } else {
        // Als er geen toernooi is geselecteerd, toon alle teams
        $teams = Team::all();
    }

    $tournaments = Tournament::all();

    return view('teams.index', compact('teams', 'tournaments', 'selectedTournamentId'));
}

}

