<?php

namespace App\Policies;

use App\User;
use App\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the Thread.
     *
     * @param  \App\User  $user
     * @param  \App\Thread  $Thread
     * @return mixed
     */
    public function view(User $user,Thread $thread)
    {
        //
    }

    /**
     * Determine whether the user can create Threads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the Thread.
     *
     * @param  \App\User  $user
     * @param  \App\Thread  $Thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
         //Allowing only the authorised user
    //     if(auth()->user()->id !== $thread->user_id){
      //      abort(401,"unauthorized");
    //    }

        return $thread->user->id == $user->id;
    }

    /**
     * Determine whether the user can delete the Thread.
     *
     * @param  \App\User  $user
     * @param  \App\Thread  $Thread
     * @return mixed
     */
    public function delete(User $user, Thread $thread)
    {
        //
    }
}
