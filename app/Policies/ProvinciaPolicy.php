<?php

namespace App\Policies;

use App\User;
use App\Provincia;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProvinciaPolicy
{
    use HandlesAuthorization;

    // public function before($user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return true;
    //     }
    // }
    
    /**
     * Determine whether the user can view any provincias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the provincia.
     *
     * @param  \App\User  $user
     * @param  \App\Provincia  $provincia
     * @return mixed
     */
    public function view(User $user, Provincia $provincia)
    {
        return $user->hasPermissionTo('View provincia');
    }

    /**
     * Determine whether the user can create provincias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create provincia');
    }

    /**
     * Determine whether the user can update the provincia.
     *
     * @param  \App\User  $user
     * @param  \App\Provincia  $provincia
     * @return mixed
     */
    public function update(User $user, Provincia $provincia)
    {
        return $user->hasPermissionTo('Update provincia');
    }

    /**
     * Determine whether the user can delete the provincia.
     *
     * @param  \App\User  $user
     * @param  \App\Provincia  $provincia
     * @return mixed
     */
    public function delete(User $user, Provincia $provincia)
    {
        return $user->hasPermissionTo('Delete provincia');
    }

    /**
     * Determine whether the user can restore the provincia.
     *
     * @param  \App\User  $user
     * @param  \App\Provincia  $provincia
     * @return mixed
     */
    public function restore(User $user, Provincia $provincia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the provincia.
     *
     * @param  \App\User  $user
     * @param  \App\Provincia  $provincia
     * @return mixed
     */
    public function forceDelete(User $user, Provincia $provincia)
    {
        //
    }
}
