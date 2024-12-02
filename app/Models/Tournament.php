<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Dit moet je toevoegen
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory; // Gebruik de trait hier

    protected $fillable = [
        'title',
        'max_teams',
        'started',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
