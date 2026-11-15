<?php

declare(strict_types=1);

namespace App\Access;

use App\Models\User;
use ImranDev\FilamentMaster\Services\Permissions\AdhikarPermissionHook;

/**
 * Stand-in for the unpublished imrandevbd/adhikar package.
 * Permission keys are formatted by laravel-filament-master's AdhikarPermissionHook
 * so a future Adhikar install can replace this class behind the same checks.
 */
class AccessManager
{
    public function __construct(private readonly AdhikarPermissionHook $hook) {}

    public function allows(User $user, string $permission, ?string $module = null): bool
    {
        if (! $user->is_active) {
            return false;
        }

        if ($user->isSuperAdmin()) {
            return true;
        }

        $names = $user->permissionNames();

        if (in_array('*', $names, true) || in_array($permission, $names, true)) {
            return true;
        }

        if (in_array('audit.readonly', $names, true) && str_starts_with($permission, 'view')) {
            return true;
        }

        if ($module && in_array('module.'.$module, $names, true)) {
            return true;
        }

        return false;
    }

    public function format(string $action, string $model): string
    {
        return $this->hook->formatPermission($action, $model);
    }
}
