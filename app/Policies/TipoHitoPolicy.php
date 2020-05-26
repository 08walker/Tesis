<?php

namespace App\Policies;

use App\User;
use App\TipoHito;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoHitoPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any tipo hitos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tipo hito.
     *
     * @param  \App\User  $user
     * @param  \App\TipoHito  $tipoHito
     * @return mixed
     */
    public function view(User $user, TipoHito $tipoHito)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can create tipo hitos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can update the tipo hito.
     *
     * @param  \App\User  $user
     * @param  \App\TipoHito  $tipoHito
     * @return mixed
     */
    public function update(User $user, TipoHito $tipoHito)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can delete the tipo hito.
     *
     * @param  \App\User  $user
     * @param  \App\TipoHito  $tipoHito
     * @return mixed
     */
    public function delete(User $user, TipoHito $tipoHito)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can restore the tipo hito.
     *
     * @param  \App\User  $user
     * @param  \App\TipoHito  $tipoHito
     * @return mixed
     */
    public function restore(User $user, TipoHito $tipoHito)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tipo hito.
     *
     * @param  \App\User  $user
     * @param  \App\TipoHito  $tipoHito
     * @return mixed
     */
    public function forceDelete(User $user, TipoHito $tipoHito)
    {
        //
    }
}
