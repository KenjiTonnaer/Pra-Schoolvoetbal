<?php

namespace Database\Seeders;

use App\Models\TournamentTeam;
use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentTeamSeeder extends Seeder
{

    public function run(): void
    {
        TournamentTeam::factory(10)->create();
    }
}
