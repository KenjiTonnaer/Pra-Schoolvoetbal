<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Maak 10 gebruikers aan
        \App\Models\User::factory(10)->create();
    }
}
