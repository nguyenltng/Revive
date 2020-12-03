<?php

namespace App\Policies;

use App\Enums\PermissionType;
use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user){
        return $this->author($user, PermissionType::VIEW_USER);
    }

    public function view(User $user, User $model){
        return $this->author($user, PermissionType::VIEW_USER);
    }

    public function create(User $user){
        return $this->author($user, PermissionType::CREATE_USER);
    }

    public function update(User $user, User $model){
        return $this->author($user, PermissionType::UPDATE_USER);
    }

    public function delete(User $user, User $model){
        return $this->author($user, PermissionType::DELETE_USER);
    }
}
