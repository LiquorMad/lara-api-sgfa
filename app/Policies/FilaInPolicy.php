<?php

namespace App\Policies;

use App\Models\FilaIn;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class FilaInPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, FilaIn $filaIn): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        //
        return Auth::user()->id === 1 OR 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user, FilaIn $filaIn): bool
    {
        //
        return (
            $user->filaIn->contains($filaIn) || 
            $user->id === $filaIn->idUser
        );


    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user, FilaIn $filaIn): bool
    {
        //
                return ($user->id === $filaIn->idUser);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(?User $user, FilaIn $filaIn): bool
    {
        //
                return ($user->id === $filaIn->idUser);

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(?User $user, FilaIn $filaIn): bool
    {
        //
                return ($user->id === $filaIn->idUser);

    }
}
