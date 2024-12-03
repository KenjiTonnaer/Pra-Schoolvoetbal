<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    public function edit($id)
{
    $game = Game::findOrFail($id);
    return view('games.edit', compact('game'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'team_1_score' => 'required|integer|min:0',
        'team_2_score' => 'required|integer|min:0',
    ]);

    $game = Game::findOrFail($id);
    $game->update([
        'team_1_score' => $request->team_1_score,
        'team_2_score' => $request->team_2_score,
    ]);

    return redirect()->route('homepage')->with('success', 'Wedstrijd is succesvol aangepast!');
}

}
