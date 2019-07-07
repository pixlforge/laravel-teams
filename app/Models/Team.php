<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Checks if the team has an active subscription.
     *
     * @return boolean
     */
    public function hasSubscription()
    {
        return false;
    }

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
     * Get all of the subscriptions for the Stripe model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(TeamSubscription::class, $this->getForeignKey())
            ->orderBy('created_at', 'desc');
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
