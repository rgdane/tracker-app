<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability): bool|null
    {
        // Admin boleh semua
        if ($user->hasRole('admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_any_user');
    }

    public function view(User $user, User $model): bool
    {
        return $user->hasPermissionTo('view_user');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_user');
    }

    public function update(User $user, User $model): bool
    {
        if ($user->hasRole('staff')) {
            return $user->id === $model->id;
        }

        return $user->hasPermissionTo('update_user');
    }

    public function delete(User $user, User $model): bool
    {
        return $user->hasPermissionTo('delete_user');
    }
}
