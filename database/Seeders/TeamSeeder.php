<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        // Maak 10 teams aan
        \App\Models\Team::factory(10)->create();
    }
}
