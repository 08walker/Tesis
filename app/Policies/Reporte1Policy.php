<?php

namespace App\Policies;

use App\User;
use App\Reporte1;
use Illuminate\Auth\Access\HandlesAuthorization;

class Reporte1Policy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    public function view(User $user, Reporte1 $reporte1)
    {
        return $user->hasPermissionTo('View reporte');
    }

}
