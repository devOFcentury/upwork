<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Conversation $conversation)
    {
        if ($user->id == $conversation->job->user_id) {
            return $conversation->from == $conversation->job->user_id;
        } else {
            return $user->proposals->contains(function($value, $key) use ($conversation, $user) {
                return $value['validated'] == 1
                && $value['job_id'] == $conversation->job->id
                && $conversation->to == $user->id;
            });
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Conversation $conversation)
    {
        //
    }
}
