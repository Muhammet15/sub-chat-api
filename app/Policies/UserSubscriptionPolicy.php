<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSubscriptionPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserSubscription $userSubscription): bool
    {
        return $user->id === $userSubscription->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserSubscription $userSubscription): bool
    {
        return $user->id === $userSubscription->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserSubscription $userSubscription): bool
    {
        return $user->id === $userSubscription->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserSubscription $userSubscription): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserSubscription $userSubscription): bool
    {
        //
    }
}
