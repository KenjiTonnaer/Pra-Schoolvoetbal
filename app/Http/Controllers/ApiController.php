<?php
namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use App\Models\Team;
use App\Models\Tournament_team;
use App\Models\Game;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {
        $tournaments = Tournament::all();
        $users = User::all();
        $teams = Team::all();
        $tournamentTeams = Tournament_team::all();
        $games = Game::all();

        return response()->json([
            'tournaments' => $tournaments,
            'users' => $users,
            'teams' => $teams,
            'tournament_teams' => $tournamentTeams,
            'games' => $games,
        ]);
    }
}
