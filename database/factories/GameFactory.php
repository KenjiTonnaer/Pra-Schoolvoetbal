<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition(): array
    {
        return [
            'tournament_id' => Tournament::factory(),  // Verbindt de game met een tournament
            'team_1' => Team::factory(),  // Verbindt de game met team 1
            'team_2' => Team::factory(),  // Verbindt de game met team 2
            'team_1_score' => $this->faker->numberBetween(0, 5),
            'team_2_score' => $this->faker->numberBetween(0, 5),
        ];
    }
}
