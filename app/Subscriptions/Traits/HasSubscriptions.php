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
}