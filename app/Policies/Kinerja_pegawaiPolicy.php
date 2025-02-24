<?php

namespace App\Policies;

use App\Models\Kinerja_pegawai;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class Kinerja_pegawaiPolicy
{
    public function update(User $user, Kinerja_pegawai $kinerjaPegawai): bool
    {
        return $user->id === $kinerjaPegawai->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kinerja_pegawai $kinerjaPegawai): bool
    {
        return $user->id === $kinerjaPegawai->user_id;
    }
}
