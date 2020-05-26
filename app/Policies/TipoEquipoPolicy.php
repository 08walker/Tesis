<?php

namespace App\Policies;

use App\User;
use App\TipoEquipo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoEquipoPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any tipo equipos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tipo equipo.
     *
     * @param  \App\User  $user
     * @param  \App\TipoEquipo  $tipoEquipo
     * @return mixed
     */
    public function view(User $user, TipoEquipo $tipoEquipo)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can create tipo equipos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can update the tipo equipo.
     *
     * @param  \App\User  $user
     * @param  \App\TipoEquipo  $tipoEquipo
     * @return mixed
     */
    public function update(User $user, TipoEquipo $tipoEquipo)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can delete the tipo equipo.
     *
     * @param  \App\User  $user
     * @param  \App\TipoEquipo  $tipoEquipo
     * @return mixed
     */
    public function delete(User $user, TipoEquipo $tipoEquipo)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can restore the tipo equipo.
     *
     * @param  \App\User  $user
     * @param  \App\TipoEquipo  $tipoEquipo
     * @return mixed
     */
    public function restore(User $user, TipoEquipo $tipoEquipo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tipo equipo.
     *
     * @param  \App\User  $user
     * @param  \App\TipoEquipo  $tipoEquipo
     * @return mixed
     */
    public function forceDelete(User $user, TipoEquipo $tipoEquipo)
    {
        //
    }
}
