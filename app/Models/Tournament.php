<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Dit moet je toevoegen
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'max_teams',
        'started',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'tournament_teams', 'tournament_id', 'team_id');
    }

}
