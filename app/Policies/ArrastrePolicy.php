<?php

namespace App\Policies;

use App\User;
use App\Arrastre;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArrastrePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any arrastres.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the arrastre.
     *
     * @param  \App\User  $user
     * @param  \App\Arrastre  $arrastre
     * @return mixed
     */
    public function view(User $user, Arrastre $arrastre)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can create arrastres.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can update the arrastre.
     *
     * @param  \App\User  $user
     * @param  \App\Arrastre  $arrastre
     * @return mixed
     */
    public function update(User $user, Arrastre $arrastre)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can delete the arrastre.
     *
     * @param  \App\User  $user
     * @param  \App\Arrastre  $arrastre
     * @return mixed
     */
    public function delete(User $user, Arrastre $arrastre)
    {
        return $user->hasRole('Transporte');
    }

    /**
     * Determine whether the user can restore the arrastre.
     *
     * @param  \App\User  $user
     * @param  \App\Arrastre  $arrastre
     * @return mixed
     */
    public function restore(User $user, Arrastre $arrastre)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the arrastre.
     *
     * @param  \App\User  $user
     * @param  \App\Arrastre  $arrastre
     * @return mixed
     */
    public function forceDelete(User $user, Arrastre $arrastre)
    {
        //
    }
}
