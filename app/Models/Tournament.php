<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
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
