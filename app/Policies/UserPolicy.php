<?php

namespace App\Policies;

use App\User;
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

    public function admin(User $user)
      {
        foreach ($user->roles as $role) {
          if($role->slug == 'admin') {
            return  true;
          }
          return false;
        }
      }
}
