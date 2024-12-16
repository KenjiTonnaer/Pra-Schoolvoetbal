<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Game;

class TournamentController extends Controller
{
    // Toon inschrijfformulier
    public function showRegistrationForm()
    {
        $tournaments = Tournament::all();
        $teams = Team::all();

        return view('tournament.registration', compact('tournaments', 'teams'));
    }

    // Speler registreren voor een toernooi
    public function registerPlayer(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string|max:255',
            'team_name' => 'nullable|string|max:255',
            'team_id' => 'nullable|exists:teams,id',
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        if (!$request->team_name && !$request->team_id) {
            return back()->withErrors(['team_name' => 'Kies een bestaand team of maak een nieuw team aan.']);
        }

        if ($request->team_name) {
            $team = Team::create([
                'name' => $request->team_name,
                'players' => json_encode([$request->player_name]),
            ]);
        } else {
            $team = Team::find($request->team_id);

            $players = json_decode($team->players, true);
            $players[] = $request->player_name;
            $team->players = json_encode($players);
            $team->save();
        }

        $team->tournaments()->attach($request->tournament_id);

        return redirect('/')->with('success', 'Speler succesvol geregistreerd!');
    }

    // Homepage tonen met schema en dropdown
    public function index(Request $request)
    {
        $tournaments = Tournament::all();
        $selectedTournamentId = $request->input('tournament');

        $tournament = $selectedTournamentId
            ? Tournament::find($selectedTournamentId)
            : ($tournaments->first() ?? null); // Gebruik het eerste toernooi als fallback

        if ($tournament) {
            $schedule = Game::where('tournament_id', $tournament->id)
                ->with(['team1', 'team2'])
                ->get()
                ->map(function ($game) {
                    return [
                        'id' => $game->id,
                        'team_1' => $game->team1->name,
                        'team_1_score' => $game->team_1_score,
                        'team_2' => $game->team2->name,
                        'team_2_score' => $game->team_2_score,
                    ];
                });
        } else {
            $schedule = [];
        }

        return view('homepage', [
            'tournaments' => $tournaments,
            'tournament' => $tournament,
            'schedule' => $schedule,
            'selectedTournamentId' => $selectedTournamentId,
        ]);
    }

    // Wedstrijdschema genereren voor een toernooi
    public function generateSchedule($tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);
        $teams = $tournament->teams;

        if ($teams->count() < 2) {
            return redirect()->back()->with('error', 'Niet genoeg teams om wedstrijden in te plannen.');
        }

        // Controleer of er al wedstrijden bestaan
        if (Game::where('tournament_id', $tournamentId)->exists()) {
            return redirect()->back()->with('error', 'Er zijn al wedstrijden gegenereerd voor dit toernooi.');
        }

        foreach ($teams as $index1 => $team1) {
            for ($index2 = $index1 + 1; $index2 < $teams->count(); $index2++) {
                $team2 = $teams[$index2];

                Game::create([
                    'tournament_id' => $tournamentId,
                    'team_1' => $team1->id,
                    'team_2' => $team2->id,
                    'team_1_score' => 0,
                    'team_2_score' => 0,
                ]);
            }
        }

        return redirect()->route('homepage')->with('success', 'Wedstrijden succesvol gegenereerd!');
    }

    // Dropdown logica
    public function dropdown(Request $request)
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

        return view('homepage', compact('teams', 'tournaments', 'selectedTournamentId'));
    }
}
