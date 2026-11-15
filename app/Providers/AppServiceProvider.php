<?php

declare(strict_types=1);

namespace App\Providers;

use App\Support\BanglaDate;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Tarikh\Tarikh;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // The published AI Catalog Filament resource is not compatible with Filament 3 method signatures.
        config(['ai-catalog.filament.enabled' => false]);
    }

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(120)->by((string) ($request->user()?->id ?: $request->ip()));
        });

        Tarikh::macro('fiscalCode', fn (): string => BanglaDate::fiscalCode($this));
        Tarikh::macro('toBangla', fn (): string => BanglaDate::gregorian($this));
        Tarikh::macro('toBengaliCalendar', fn (): string => BanglaDate::bengaliLabel($this));
        Tarikh::macro('banglaDigits', fn (string $value): string => BanglaDate::digits($value));
    }
}
