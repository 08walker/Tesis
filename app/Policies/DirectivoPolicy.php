<?php

namespace App\Policies;

use App\User;
use App\Directivo;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectivoPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any directivos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the directivo.
     *
     * @param  \App\User  $user
     * @param  \App\Directivo  $directivo
     * @return mixed
     */
    public function view(User $user, Directivo $directivo)
    {
        return $user->hasPermissionTo('View directivo');
    }

    /**
     * Determine whether the user can create directivos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create directivo');
    }

    /**
     * Determine whether the user can update the directivo.
     *
     * @param  \App\User  $user
     * @param  \App\Directivo  $directivo
     * @return mixed
     */
    public function update(User $user, Directivo $directivo)
    {
        return $user->hasPermissionTo('Update directivo');
    }

    /**
     * Determine whether the user can delete the directivo.
     *
     * @param  \App\User  $user
     * @param  \App\Directivo  $directivo
     * @return mixed
     */
    public function delete(User $user, Directivo $directivo)
    {
        return $user->hasPermissionTo('Delete directivo');
    }

    /**
     * Determine whether the user can restore the directivo.
     *
     * @param  \App\User  $user
     * @param  \App\Directivo  $directivo
     * @return mixed
     */
    public function restore(User $user, Directivo $directivo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the directivo.
     *
     * @param  \App\User  $user
     * @param  \App\Directivo  $directivo
     * @return mixed
     */
    public function forceDelete(User $user, Directivo $directivo)
    {
        //
    }
}
