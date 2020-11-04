<?php

namespace App\Policies;

use App\User;
use App\Traza;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrazaPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    public function view(User $user, Traza $traza)
    {
        return $user->hasPermissionTo('View traza');
    }
}
