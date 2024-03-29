<?php

namespace App\Policies;

use App\User;
use App\TipoArrastre;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoArrastrePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any tipo arratres.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tipo arratre.
     *
     * @param  \App\User  $user
     * @param  \App\TipoArrastre  $TipoArrastre
     * @return mixed
     */
    public function view(User $user, TipoArrastre $tipoArrastre)
    {
        return $user->hasPermissionTo('View tArrastre');
    }

    /**
     * Determine whether the user can create tipo arratres.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create tArrastre');
    }

    /**
     * Determine whether the user can update the tipo arratre.
     *
     * @param  \App\User  $user
     * @param  \App\TipoArrastre  $TipoArrastre
     * @return mixed
     */
    public function update(User $user, TipoArrastre $tipoArrastre)
    {
        return $user->hasPermissionTo('Update tArrastre');
    }

    /**
     * Determine whether the user can delete the tipo arratre.
     *
     * @param  \App\User  $user
     * @param  \App\TipoArrastre  $TipoArrastre
     * @return mixed
     */
    public function delete(User $user, TipoArrastre $tipoArrastre)
    {
        return $user->hasPermissionTo('Delete tArrastre');
    }

    /**
     * Determine whether the user can restore the tipo arratre.
     *
     * @param  \App\User  $user
     * @param  \App\TipoArrastre  $TipoArrastre
     * @return mixed
     */
    public function restore(User $user, TipoArrastre $tipoArrastre)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tipo arratre.
     *
     * @param  \App\User  $user
     * @param  \App\TipoArrastre  $TipoArrastre
     * @return mixed
     */
    public function forceDelete(User $user, TipoArrastre $tipoArrastre)
    {
        //
    }
}
