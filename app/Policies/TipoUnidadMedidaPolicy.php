<?php

namespace App\Policies;

use App\User;
use App\TipoUnidadMedida;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoUnidadMedidaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any tipo unidad medidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tipo unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\TipoUnidadMedida  $tipoUnidadMedida
     * @return mixed
     */
    public function view(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can create tipo unidad medidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can update the tipo unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\TipoUnidadMedida  $tipoUnidadMedida
     * @return mixed
     */
    public function update(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can delete the tipo unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\TipoUnidadMedida  $tipoUnidadMedida
     * @return mixed
     */
    public function delete(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can restore the tipo unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\TipoUnidadMedida  $tipoUnidadMedida
     * @return mixed
     */
    public function restore(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tipo unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\TipoUnidadMedida  $tipoUnidadMedida
     * @return mixed
     */
    public function forceDelete(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        //
    }
}
