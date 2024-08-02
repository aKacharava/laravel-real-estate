<?php

namespace App\Policies;

use App\Models\User;
use App\Models\listing;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    public function before(?User $user, $ability): ?bool
    {
        if ($user?->is_admin) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, listing $listing): bool
    {
        if ($listing->by_user_id === $user?->id) {
            return true;
        }

        return !$listing->sold_at;
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
    public function update(User $user, listing $listing): bool
    {
        return !$listing->sold_at && ($user->id === $listing->by_user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }
}
