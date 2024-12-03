<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'players',
    ];

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_teams')->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function players()
{
    return $this->hasMany(user::class);
}

}
