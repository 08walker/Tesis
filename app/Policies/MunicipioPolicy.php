<?php

namespace App\Policies;

use App\User;
use App\Municipio;
use Illuminate\Auth\Access\HandlesAuthorization;

class MunicipioPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any municipios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the municipio.
     *
     * @param  \App\User  $user
     * @param  \App\Municipio  $municipio
     * @return mixed
     */
    public function view(User $user, Municipio $municipio)
    {
        return $user->hasPermissionTo('View municipio');
    }

    /**
     * Determine whether the user can create municipios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create municipio');
    }

    /**
     * Determine whether the user can update the municipio.
     *
     * @param  \App\User  $user
     * @param  \App\Municipio  $municipio
     * @return mixed
     */
    public function update(User $user, Municipio $municipio)
    {
        return $user->hasPermissionTo('Update municipio');
    }

    /**
     * Determine whether the user can delete the municipio.
     *
     * @param  \App\User  $user
     * @param  \App\Municipio  $municipio
     * @return mixed
     */
    public function delete(User $user, Municipio $municipio)
    {
        return $user->hasPermissionTo('Delete municipio');
    }

    /**
     * Determine whether the user can restore the municipio.
     *
     * @param  \App\User  $user
     * @param  \App\Municipio  $municipio
     * @return mixed
     */
    public function restore(User $user, Municipio $municipio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the municipio.
     *
     * @param  \App\User  $user
     * @param  \App\Municipio  $municipio
     * @return mixed
     */
    public function forceDelete(User $user, Municipio $municipio)
    {
        //
    }
}
