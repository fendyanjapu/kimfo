<?php

namespace App\Policies;

use App\Models\SasaranUtama;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SasaranUtamaPolicy
{
    public function update(User $user, SasaranUtama $sasaranUtama): bool
    {
        return $user->id === $sasaranUtama->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SasaranUtama $sasaranUtama): bool
    {
        return $user->id === $sasaranUtama->user_id;
    }
}
