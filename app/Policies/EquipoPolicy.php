<?php

namespace App\Policies;

use App\User;
use App\Equipo;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipoPolicy
{
    use HandlesAuthorization;

    // public function before($user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return true;
    //     }
    // }
    
    /**
     * Determine whether the user can view any equipos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the equipo.
     *
     * @param  \App\User  $user
     * @param  \App\Equipo  $equipo
     * @return mixed
     */
    public function view(User $user, Equipo $equipo)
    {
        return $user->hasPermissionTo('View equipo');
    }

    /**
     * Determine whether the user can create equipos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create equipo');
    }

    /**
     * Determine whether the user can update the equipo.
     *
     * @param  \App\User  $user
     * @param  \App\Equipo  $equipo
     * @return mixed
     */
    public function update(User $user, Equipo $equipo)
    {
        return $user->hasPermissionTo('Update equipo');
    }

    /**
     * Determine whether the user can delete the equipo.
     *
     * @param  \App\User  $user
     * @param  \App\Equipo  $equipo
     * @return mixed
     */
    public function delete(User $user, Equipo $equipo)
    {
        return $user->hasPermissionTo('Delete equipo');
    }

    /**
     * Determine whether the user can restore the equipo.
     *
     * @param  \App\User  $user
     * @param  \App\Equipo  $equipo
     * @return mixed
     */
    public function restore(User $user, Equipo $equipo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the equipo.
     *
     * @param  \App\User  $user
     * @param  \App\Equipo  $equipo
     * @return mixed
     */
    public function forceDelete(User $user, Equipo $equipo)
    {
        //
    }
}
