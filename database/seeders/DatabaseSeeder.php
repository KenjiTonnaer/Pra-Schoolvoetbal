<?php

namespace Database\Seeders;

use Database\Seeders\TournamentTeamSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TeamSeeder::class,
            TournamentSeeder::class,
            GameSeeder::class,
            TournamentTeamSeeder::class,
        ]);
    }
}
