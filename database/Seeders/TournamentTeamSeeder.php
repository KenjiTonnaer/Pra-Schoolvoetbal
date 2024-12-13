<?php

namespace Database\Seeders;

use App\Models\TournamentTeam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentTeamSeeder extends Seeder
{

    public function run(): void
    {
        TournamentTeam::factory(4)->create();
    }
}
