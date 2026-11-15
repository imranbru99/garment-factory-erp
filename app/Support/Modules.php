<?php

declare(strict_types=1);

namespace App\Support;

use App\Models\ModuleSetting;
use Illuminate\Support\Facades\Schema;

class Modules
{
    /** @var array<string, bool>|null */
    protected static ?array $cache = null;

    public static function enabled(string $key): bool
    {
        $map = self::all();

        return $map[$key] ?? true;
    }

    public static function forget(): void
    {
        self::$cache = null;
    }

    /** @return array<string, bool> */
    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        try {
            if (! Schema::hasTable('module_settings')) {
                return self::$cache = [];
            }

            self::$cache = ModuleSetting::query()
                ->withoutGlobalScopes()
                ->pluck('enabled', 'module_key')
                ->map(fn ($enabled) => (bool) $enabled)
                ->all();
        } catch (\Throwable) {
            self::$cache = [];
        }

        return self::$cache;
    }
}
