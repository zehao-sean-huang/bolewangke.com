<?php

namespace App\Policies;

use App\Subscription;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function process(User $user, Subscription $subscription) {
        if ($user->role->name === 'admin') {
            return true;
        }
        if ($user->role->name === 'service') {
            return true;
        }
        return false;
    }
}
