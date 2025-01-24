<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function updateUser(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }
}
