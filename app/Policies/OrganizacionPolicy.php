<?php

namespace App\Policies;

use App\User;
use App\Organizacion;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizacionPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any organizacions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the organizacion.
     *
     * @param  \App\User  $user
     * @param  \App\Organizacion  $organizacion
     * @return mixed
     */
    public function view(User $user, Organizacion $organizacion)
    {
        return $user->hasPermissionTo('View organization');
    }

    /**
     * Determine whether the user can create organizacions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create organization');
    }

    /**
     * Determine whether the user can update the organizacion.
     *
     * @param  \App\User  $user
     * @param  \App\Organizacion  $organizacion
     * @return mixed
     */
    public function update(User $user, Organizacion $organizacion)
    {
        return $user->hasPermissionTo('Update organization');
    }

    /**
     * Determine whether the user can delete the organizacion.
     *
     * @param  \App\User  $user
     * @param  \App\Organizacion  $organizacion
     * @return mixed
     */
    public function delete(User $user, Organizacion $organizacion)
    {
        return $user->hasPermissionTo('Delete organization');
    }

    /**
     * Determine whether the user can restore the organizacion.
     *
     * @param  \App\User  $user
     * @param  \App\Organizacion  $organizacion
     * @return mixed
     */
    public function restore(User $user, Organizacion $organizacion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the organizacion.
     *
     * @param  \App\User  $user
     * @param  \App\Organizacion  $organizacion
     * @return mixed
     */
    public function forceDelete(User $user, Organizacion $organizacion)
    {
        //
    }
}
