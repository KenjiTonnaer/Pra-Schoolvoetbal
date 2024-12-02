<?php

namespace Database\Factories;

use App\Models\TournamentTeam;
use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentTeamFactory extends Factory
{
    protected $model = TournamentTeam::class;

    public function definition(): array
    {
        return [
            'tournament_id' => Tournament::factory(),
            'team_id' => Team::factory(),
            // Voeg andere benodigde velden toe
        ];
    }
}
