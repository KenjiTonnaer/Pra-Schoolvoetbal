<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'team_id', 
        'role',
    ];

    /**
     * De verborgen attributen voor arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * De casts van attributen.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relatie met de team-tabel.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
