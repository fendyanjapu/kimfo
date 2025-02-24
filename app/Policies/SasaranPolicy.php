<?php

namespace App\Policies;

use App\Models\Sasaran;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SasaranPolicy
{
    public function update(User $user, Sasaran $sasaran): bool
    {
        return $user->id === $sasaran->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sasaran $sasaran): bool
    {
        return $user->id === $sasaran->user_id;
    }

}
