<?php

namespace App\Policies;

use App\User;
use App\Hito;
use Illuminate\Auth\Access\HandlesAuthorization;

class HitoPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any hitos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the hito.
     *
     * @param  \App\User  $user
     * @param  \App\Hito  $hito
     * @return mixed
     */
    public function view(User $user, Hito $hito)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can create hitos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can update the hito.
     *
     * @param  \App\User  $user
     * @param  \App\Hito  $hito
     * @return mixed
     */
    public function update(User $user, Hito $hito)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can delete the hito.
     *
     * @param  \App\User  $user
     * @param  \App\Hito  $hito
     * @return mixed
     */
    public function delete(User $user, Hito $hito)
    {
        return $user->hasRole('Analista');
    }

    /**
     * Determine whether the user can restore the hito.
     *
     * @param  \App\User  $user
     * @param  \App\Hito  $hito
     * @return mixed
     */
    public function restore(User $user, Hito $hito)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the hito.
     *
     * @param  \App\User  $user
     * @param  \App\Hito  $hito
     * @return mixed
     */
    public function forceDelete(User $user, Hito $hito)
    {
        //
    }
}
