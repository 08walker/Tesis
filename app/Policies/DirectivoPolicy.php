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

    public function view(User $user, Directivo $directivo)
    {
        return $user->hasPermissionTo('View directivo');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create directivo');
    }

    public function update(User $user, Directivo $directivo)
    {
        return $user->hasPermissionTo('Update directivo');
    }

    public function delete(User $user, Directivo $directivo)
    {
        return $user->hasPermissionTo('Delete directivo');
    }
}
