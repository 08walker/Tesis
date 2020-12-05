<?php

namespace App\Policies;

use App\User;
use App\Lugar;
use Illuminate\Auth\Access\HandlesAuthorization;

class LugarPolicy
{
    use HandlesAuthorization;

    // public function before($user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return true;
    //     }
    // }
    
    /**
     * Determine whether the user can view any lugars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the lugar.
     *
     * @param  \App\User  $user
     * @param  \App\Lugar  $lugar
     * @return mixed
     */
    public function view(User $user, Lugar $lugar)
    {
        return $user->hasPermissionTo('View lugar');
    }

    /**
     * Determine whether the user can create lugars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create lugar');
    }

    /**
     * Determine whether the user can update the lugar.
     *
     * @param  \App\User  $user
     * @param  \App\Lugar  $lugar
     * @return mixed
     */
    public function update(User $user, Lugar $lugar)
    {
        return $user->hasPermissionTo('Update lugar');
    }

    /**
     * Determine whether the user can delete the lugar.
     *
     * @param  \App\User  $user
     * @param  \App\Lugar  $lugar
     * @return mixed
     */
    public function delete(User $user, Lugar $lugar)
    {
        return $user->hasPermissionTo('Delete lugar');
    }

    /**
     * Determine whether the user can restore the lugar.
     *
     * @param  \App\User  $user
     * @param  \App\Lugar  $lugar
     * @return mixed
     */
    public function restore(User $user, Lugar $lugar)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the lugar.
     *
     * @param  \App\User  $user
     * @param  \App\Lugar  $lugar
     * @return mixed
     */
    public function forceDelete(User $user, Lugar $lugar)
    {
        //
    }
}
