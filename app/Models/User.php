<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Checks if the user is the only admin on the team.
     *
     * @param Team $team
     * @return boolean
     */
    public function isOnlyAdminInTeam(Team $team)
    {
        return $this->hasRole('team_admin', $team->id) &&
               $team->users()->whereRoleIs('team_admin', $team->id)->count() === 1;
    }

    /**
     * Teams relationship.
     *
     * @return void
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class)
            ->withTimestamps();
    }
}
