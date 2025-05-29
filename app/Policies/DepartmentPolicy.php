<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Department;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any_department');
    }

    public function view(User $user, Department $department): bool
    {
        return $user->can('view_department');
    }

    public function create(User $user): bool
    {
        return $user->can('create_department');
    }

    public function update(User $user, Department $department): bool
    {
        return $user->can('update_department');
    }

    public function delete(User $user, Department $department): bool
    {
        return $user->can('delete_department');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_department');
    }

    public function restore(User $user, Department $department): bool
    {
        return $user->can('restore_department');
    }

    public function forceDelete(User $user, Department $department): bool
    {
        return $user->can('force_delete_department');
    }
}
