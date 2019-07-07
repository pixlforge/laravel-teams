<?php

namespace App\Models;

use Laravel\Cashier\Subscription;

class TeamSubscription extends Subscription
{
    /**
     * Get the model related to the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Team::class, (new Team)->getForeignKey());
    }
}
