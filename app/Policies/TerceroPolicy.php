<?php

namespace App\Policies;

use App\User;
use App\Tercero;
use Illuminate\Auth\Access\HandlesAuthorization;

class TerceroPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any terceros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tercero.
     *
     * @param  \App\User  $user
     * @param  \App\Tercero  $tercero
     * @return mixed
     */
    public function view(User $user, Tercero $tercero)
    {
        return $user->hasRole('Analista')||$user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can create terceros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Analista')||$user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can update the tercero.
     *
     * @param  \App\User  $user
     * @param  \App\Tercero  $tercero
     * @return mixed
     */
    public function update(User $user, Tercero $tercero)
    {
        return $user->hasRole('Analista')||$user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can delete the tercero.
     *
     * @param  \App\User  $user
     * @param  \App\Tercero  $tercero
     * @return mixed
     */
    public function delete(User $user, Tercero $tercero)
    {
        return $user->hasRole('Analista')||$user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can restore the tercero.
     *
     * @param  \App\User  $user
     * @param  \App\Tercero  $tercero
     * @return mixed
     */
    public function restore(User $user, Tercero $tercero)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tercero.
     *
     * @param  \App\User  $user
     * @param  \App\Tercero  $tercero
     * @return mixed
     */
    public function forceDelete(User $user, Tercero $tercero)
    {
        //
    }
}
