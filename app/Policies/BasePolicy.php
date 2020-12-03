<?php


namespace App\Policies;


use App\Models\User;

class BasePolicy
{


    public function author(User $user, string $permission)
    {
        return $user->hasPermissionTo($permission);
    }
}
