<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAddresspolicy
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

    public function own(User $user, UserAddress $address)
    {
        return $user->id == $address->user_id;
//        return 2 == $address->user_id;
    }
}
