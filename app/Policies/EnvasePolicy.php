<?php

namespace App\Policies;

use App\User;
use App\Envase;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnvasePolicy
{
    use HandlesAuthorization;

    // public function before($user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return true;
    //     }
    // }
    
    /**
     * Determine whether the user can view any envases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the envase.
     *
     * @param  \App\User  $user
     * @param  \App\Envase  $envase
     * @return mixed
     */
    public function view(User $user, Envase $envase)
    {
        return $user->hasPermissionTo('View envase');
    }

    /**
     * Determine whether the user can create envases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create envase');
    }

    /**
     * Determine whether the user can update the envase.
     *
     * @param  \App\User  $user
     * @param  \App\Envase  $envase
     * @return mixed
     */
    public function update(User $user, Envase $envase)
    {
        return $user->hasPermissionTo('Update envase');
    }

    /**
     * Determine whether the user can delete the envase.
     *
     * @param  \App\User  $user
     * @param  \App\Envase  $envase
     * @return mixed
     */
    public function delete(User $user, Envase $envase)
    {
        return $user->hasPermissionTo('Delete envase');
    }

    /**
     * Determine whether the user can restore the envase.
     *
     * @param  \App\User  $user
     * @param  \App\Envase  $envase
     * @return mixed
     */
    public function restore(User $user, Envase $envase)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the envase.
     *
     * @param  \App\User  $user
     * @param  \App\Envase  $envase
     * @return mixed
     */
    public function forceDelete(User $user, Envase $envase)
    {
        //
    }
}
