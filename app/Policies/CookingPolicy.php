<?php

namespace App\Policies;

use App\User;
use App\CookingRecipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class CookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the answer.
     *
     * @param  \App\User  $user
     * @param  \App\CookingRecipe  $cooking
     * @return mixed
     */
    public function update(User $user, $cooking){
        return $user->id = $cooking->author_id;
    }
}
