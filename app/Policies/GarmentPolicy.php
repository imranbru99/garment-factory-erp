<?php

declare(strict_types=1);

namespace App\Policies;

use App\Access\AccessManager;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class GarmentPolicy
{
    abstract protected function modelClass(): string;

    abstract protected function module(): string;

    public function viewAny(User $user): bool
    {
        return $this->can($user, 'view_any');
    }

    public function view(User $user, Model $model): bool
    {
        return $this->can($user, 'view');
    }

    public function create(User $user): bool
    {
        return $this->can($user, 'create');
    }

    public function update(User $user, Model $model): bool
    {
        return $this->can($user, 'update');
    }

    public function delete(User $user, Model $model): bool
    {
        return $this->can($user, 'delete');
    }

    public function restore(User $user, Model $model): bool
    {
        return $this->can($user, 'restore');
    }

    public function forceDelete(User $user, Model $model): bool
    {
        return $this->can($user, 'force_delete');
    }

    protected function can(User $user, string $action): bool
    {
        return app(AccessManager::class)->allows(
            $user,
            app(AccessManager::class)->format($action, $this->modelClass()),
            $this->module(),
        );
    }
}
