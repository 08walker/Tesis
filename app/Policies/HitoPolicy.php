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
    
    public function view(User $user, Hito $hito)
    {
        return $user->hasPermissionTo('View hito');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create hito');
    }

    public function update(User $user, Hito $hito)
    {
        return $user->hasPermissionTo('Update hito');
    }

    public function delete(User $user, Hito $hito)
    {
        return $user->hasPermissionTo('Delete hito');
    }
}
