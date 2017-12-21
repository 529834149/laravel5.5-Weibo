<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * 
     * @param User $currentUser 登录的用户
     * @param User $user 要进行授权的用户
     * @return type
     */
    public function update(User $currentUser,User $user)
    {
        return $currentUser->id === $user->id;
    }
}
