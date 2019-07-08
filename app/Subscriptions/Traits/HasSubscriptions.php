<?php

namespace App\Subscriptions\Traits;

trait HasSubscriptions
{
    /**
     * Checks if model has an active subscription.
     *
     * @return boolean
     */
    public function hasSubscription()
    {
        return $this->subscribed('main');
    }

    /**
     * Checks if the team is on the provided plan.
     *
     * @param string $plan
     * @return boolean
     */
    public function isOnPlan($plan)
    {
        return $this->subscribedToPlan($plan, 'main');
    }

    /**
     * Returns the model's current subscription.
     *
     * @return \Laravel\Cashier\Subscription|null
     */
    public function currentSubscription()
    {
        return $this->subscription('main');
    }
}