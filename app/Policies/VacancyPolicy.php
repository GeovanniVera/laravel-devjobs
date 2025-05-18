<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Auth\Access\Response;

class VacancyPolicy
{
    /**
     * Determine whether the user can view any models.
     * Determina el usuario puede ver cualquier modelo.
     * @param  \App\Models\User  $user
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 2;
    }

    /**
     * Determine whether the user can view the model.
     * Determina el usuario puede ver el modelo.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function view(User $user, Vacancy $vacancy): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     * Determina el usuario puede crear modelos.
     * @param  \App\Models\User  $user
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(User $user): bool
    {
        return $user->role === 2;
    }

    /**
     * Determine whether the user can update the model.
     * Determina el usuario puede actualizar el modelo.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(User $user, Vacancy $vacancy): bool
    {
        return $user->id === $vacancy->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     * Determina el usuario puede eliminar el modelo.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete(User $user, Vacancy $vacancy): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     * Determina el usuario puede restaurar el modelo.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function restore(User $user, Vacancy $vacancy): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * Determina el usuario puede eliminar permanentemente el modelo.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return bool
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function forceDelete(User $user, Vacancy $vacancy): bool
    {
        return false;
    }
}
