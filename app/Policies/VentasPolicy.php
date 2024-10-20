<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ventas;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_ventas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ventas $ventas): bool
    {
        return $user->can('view_ventas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_ventas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ventas $ventas): bool
    {
        return $user->can('update_ventas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ventas $ventas): bool
    {
        return $user->can('delete_ventas');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_ventas');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Ventas $ventas): bool
    {
        return $user->can('force_delete_ventas');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_ventas');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Ventas $ventas): bool
    {
        return $user->can('restore_ventas');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_ventas');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Ventas $ventas): bool
    {
        return $user->can('replicate_ventas');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_ventas');
    }
}
