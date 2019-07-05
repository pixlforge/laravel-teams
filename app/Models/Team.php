<?php

namespace App\Models;

use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Checks whether or not the team is owned by the user.
     *
     * @param User $user
     * @return boolean
     */
    public function ownedBy(User $user)
    {
        return $this->users->find($user)->hasRole('team_admin', $this->id);
    }

    /**
     * Checks whether or not the team is owned by current
     * authenticated user.
     *
     * @return boolean
     */
    public function ownedByCurrentUser()
    {
        return $this->ownedBy(auth()->user());
    }

    /**
     * Users relationship.
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
