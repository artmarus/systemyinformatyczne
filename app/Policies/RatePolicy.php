<?php

namespace App\Policies;

use App\Photo;
use App\User;
use App\Rate;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rate.
     *
     * @param  \App\User  $user
     * @param  \App\Rate  $rate
     * @return mixed
     */
    public function view(User $user, Rate $rate)
    {
        return true;
    }

    /**
     * Determine whether the user can create rates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Photo $photo)
    {
        return true;
//        return $user->id != $photo->category->id_user;
    }

    /**
     * Determine whether the user can update the rate.
     *
     * @param  \App\User  $user
     * @param  \App\Rate  $rate
     * @return mixed
     */
    public function update(User $user, Rate $rate)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the rate.
     *
     * @param  \App\User  $user
     * @param  \App\Rate  $rate
     * @return mixed
     */
    public function delete(User $user, Rate $rate)
    {
        return false;
    }
}
