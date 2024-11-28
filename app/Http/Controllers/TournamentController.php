<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Game;

class TournamentController extends Controller
{
    // Form laten zien
    public function showRegistrationForm()
    {
        // Haal alle toernooien en teams op voor de dropdowns
        $tournaments = Tournament::all();
        $teams = Team::all();

        return view('tournament.registration', compact('tournaments', 'teams'));
    }

    // Registratie afhandelen
    public function registerPlayer(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string|max:255',
            'team_name' => 'nullable|string|max:255', // Alleen als nieuw team
            'team_id' => 'nullable|exists:teams,id', // Alleen als bestaand team
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        // Controleer of er een teamnaam of teamselectie is
        if (!$request->team_name && !$request->team_id) {
            return back()->withErrors(['team_name' => 'Kies een bestaand team of maak een nieuw team aan.']);
        }

        // Nieuw team aanmaken als er geen team_id is
        if ($request->team_name) {
            $team = Team::create([
                'name' => $request->team_name,
                'players' => json_encode([$request->player_name]), // Voeg speler toe aan het nieuwe team
            ]);
        } else {
            // Bestaand team ophalen
            $team = Team::find($request->team_id);

            // Speler toevoegen aan bestaand team
            $players = json_decode($team->players, true);
            $players[] = $request->player_name;
            $team->players = json_encode($players);
            $team->save();
        }

        // Team koppelen aan het toernooi
        $team->tournaments()->attach($request->tournament_id);

        return redirect('/')->with('success', 'Succesvol ingeschreven!');
    }

    public function index()
    {
        $tournament = Tournament::latest('started')->first();

        if ($tournament) {
            $schedule = Game::where('tournament_id', $tournament->id)
                ->with(['team1', 'team2'])
                ->get()
                ->map(function ($game) {
                    return [
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
            'tournament' => $tournament,
            'schedule' => $schedule,
        ]);
    }

    public function generateSchedule($tournamentId)
    {
        // Haal alle teams op die meedoen aan het toernooi
        $teams = Team::all();

        // Controleer of er minstens twee teams zijn
        if ($teams->count() < 2) {
            return redirect()->back()->with('error', 'Niet genoeg teams om wedstrijden in te plannen.');
        }

        // Genereer het schema (round-robin)
        foreach ($teams as $index1 => $team1) {
            for ($index2 = $index1 + 1; $index2 < $teams->count(); $index2++) {
                $team2 = $teams[$index2];

                // Voeg een nieuwe wedstrijd toe
                Game::create([
                    'tournament_id' => $tournamentId,
                    'team_1' => $team1->id,
                    'team_2' => $team2->id,
                    'team_1_score' => 0, // Startwaarde
                    'team_2_score' => 0, // Startwaarde
                ]);
            }
        }

        return redirect()->route('homepage')->with('success', 'Wedstrijden succesvol ingepland.');
    }
}
