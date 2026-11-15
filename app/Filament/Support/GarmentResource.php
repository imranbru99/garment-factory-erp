<?php

declare(strict_types=1);

namespace App\Filament\Support;

use App\Access\AccessManager;
use App\Models\User;
use App\Support\Modules;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use ImranDev\FilamentMaster\Resources\BaseResource;

abstract class GarmentResource extends BaseResource
{
    protected static ?string $moduleKey = 'foundation';

    public static function hiddenFields(): array
    {
        return ['password', 'remember_token', 'two_factor_secret'];
    }

    public static function fieldLabels(): array
    {
        $fields = trans('garment.fields');

        return is_array($fields) ? $fields : [];
    }

    public static function getNavigationGroup(): ?string
    {
        $group = static::$navigationGroup;
        $groups = trans('garment.groups');
        if (! is_string($group) || ! is_array($groups)) {
            return $group;
        }

        return $groups[$group] ?? $group;
    }

    public static function getModelLabel(): string
    {
        $class = class_basename((string) static::getModel());
        $models = trans('garment.models');

        return is_array($models) ? (string) ($models[$class] ?? $class) : $class;
    }

    public static function getPluralModelLabel(): string
    {
        $class = class_basename((string) static::getModel());
        $models = trans('garment.models');
        $key = $class.'_plural';

        return is_array($models) ? (string) ($models[$key] ?? $class) : $class;
    }

    public static function canViewAny(): bool
    {
        return static::allows('view_any');
    }

    public static function canCreate(): bool
    {
        return static::allows('create');
    }

    public static function canEdit(Model $record): bool
    {
        return static::allows('update');
    }

    public static function canDelete(Model $record): bool
    {
        return static::allows('delete');
    }

    public static function canDeleteAny(): bool
    {
        return static::allows('delete');
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query();
    }

    protected static function allows(string $action): bool
    {
        $user = auth()->user();
        if (! $user instanceof User) {
            return false;
        }

        if (! Modules::enabled((string) static::$moduleKey)) {
            return false;
        }

        $access = app(AccessManager::class);

        return $access->allows($user, $access->format($action, (string) static::getModel()), static::$moduleKey);
    }
}
