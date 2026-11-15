<?php

declare(strict_types=1);

namespace Filament\Commands\Concerns;

/**
 * Compatibility shim for imrandevbd/laravel-filament-master.
 *
 * The package still imports Filament\Commands\Concerns\CanManipulateFiles.
 * Filament 3.3+ moved that trait to Filament\Support\Commands\Concerns.
 */
trait CanManipulateFiles
{
    use \Filament\Support\Commands\Concerns\CanManipulateFiles;
}
