<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    protected $model = Tournament::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'max_teams' => $this->faker->numberBetween(1, 10),
            'started' => $this->faker->dateTimeThisYear(),
        ];
    }
}
