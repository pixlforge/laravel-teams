<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Laratrust\Models\LaratrustTeam;
use App\Subscriptions\Traits\HasSubscriptions;

class Team extends LaratrustTeam
{
    use Billable, HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];    

    /**
     * Checks if the team can downgrade its subscription to a specific plan.
     *
     * @return boolean
     */
    public function canDowngrade(Plan $plan)
    {
        return $this->users->count() <= $plan->teams_limit;
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
     * Checks if user is part of the team.
     *
     * @param User $user
     * @return boolean
     */
    public function hasUser(User $user)
    {
        abort_if(!$this->users->contains($user), 403, "User does not belong to this team.");
    }

    /**
     * Checks if the maximum number of available users
     * has been reached for the team's current plan.
     *
     * @return boolean
     */
    public function hasReachedMemberLimit()
    {
        if (!$this->hasSubscription()) {
            return true;
        }

        return $this->users->count() >= $this->plan->teams_limit;
    }

    /**
     * Undocumented function
     *
     * @return App\Models\Plan
     */
    public function getPlanAttribute()
    {
        return $this->plans->first();
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
     * Plans relationship through the TeamSubscription model.
     *
     * @return void
     */
    public function plans()
    {
        return $this->hasManyThrough(Plan::class, TeamSubscription::class, 'team_id', 'provider_id', 'id', 'stripe_plan')
            ->orderBy('team_subscriptions.created_at', 'desc');
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
