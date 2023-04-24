<?php

namespace App\Policies;

use App\User;
use App\Chofer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChoferPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any chofers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the chofer.
     *
     * @param  \App\User  $user
     * @param  \App\Chofer  $chofer
     * @return mixed
     */
    public function view(User $user, Chofer $chofer)
    {
        return $user->hasPermissionTo('View chofer');
    }

    /**
     * Determine whether the user can create chofers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create chofer');
    }

    /**
     * Determine whether the user can update the chofer.
     *
     * @param  \App\User  $user
     * @param  \App\Chofer  $chofer
     * @return mixed
     */
    public function update(User $user, Chofer $chofer)
    {
        return $user->hasPermissionTo('Update chofer');
    }

    /**
     * Determine whether the user can delete the chofer.
     *
     * @param  \App\User  $user
     * @param  \App\Chofer  $chofer
     * @return mixed
     */
    public function delete(User $user, Chofer $chofer)
    {
        return $user->hasPermissionTo('Delete chofer');
    }

    /**
     * Determine whether the user can restore the chofer.
     *
     * @param  \App\User  $user
     * @param  \App\Chofer  $chofer
     * @return mixed
     */
    public function restore(User $user, Chofer $chofer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the chofer.
     *
     * @param  \App\User  $user
     * @param  \App\Chofer  $chofer
     * @return mixed
     */
    public function forceDelete(User $user, Chofer $chofer)
    {
        //
    }
}
