<?php

namespace App\Policies;

use App\User;
use App\UnidadMedida;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnidadMedidaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any unidad medidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadMedida  $unidadMedida
     * @return mixed
     */
    public function view(User $user, UnidadMedida $unidadMedida)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can create unidad medidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can update the unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadMedida  $unidadMedida
     * @return mixed
     */
    public function update(User $user, UnidadMedida $unidadMedida)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can delete the unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadMedida  $unidadMedida
     * @return mixed
     */
    public function delete(User $user, UnidadMedida $unidadMedida)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can restore the unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadMedida  $unidadMedida
     * @return mixed
     */
    public function restore(User $user, UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the unidad medida.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadMedida  $unidadMedida
     * @return mixed
     */
    public function forceDelete(User $user, UnidadMedida $unidadMedida)
    {
        //
    }
}
