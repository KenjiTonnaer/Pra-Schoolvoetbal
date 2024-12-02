<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // Maak 10 games aan
        \App\Models\Game::factory(10)->create();
    }
}
