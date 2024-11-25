<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;

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
}
