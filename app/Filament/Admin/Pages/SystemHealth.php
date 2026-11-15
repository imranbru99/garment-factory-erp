<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SystemHealth extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static string $view = 'filament.admin.health';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $title = 'System health';

    /** @return array<string, mixed> */
    protected function getViewData(): array
    {
        $redis = 'not configured';
        try {
            if (config('database.redis.default.host')) {
                Redis::connection()->ping();
                $redis = 'up';
            }
        } catch (\Throwable) {
            $redis = 'down';
        }

        return ['checks' => [
            'PHP' => PHP_VERSION,
            'Queue' => (string) config('queue.default'),
            'Database' => DB::connection()->getDriverName(),
            'Redis' => $redis,
            'AI' => config('garment.ai_enabled') ? 'on' : 'off',
            'Timezone' => (string) config('app.timezone'),
            'Display timezone' => (string) config('garment.display_timezone'),
        ]];
    }
}
