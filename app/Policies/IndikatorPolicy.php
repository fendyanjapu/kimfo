<?php

namespace App\Policies;

use App\Models\Indikator;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IndikatorPolicy
{
    public function update(User $user, Indikator $indikator): bool
    {
        return $user->id === $indikator->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Indikator $indikator): bool
    {
        return $user->id === $indikator->user_id;
    }

}
