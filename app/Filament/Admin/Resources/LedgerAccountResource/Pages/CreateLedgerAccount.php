<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LedgerAccountResource\Pages;

use App\Filament\Admin\Resources\LedgerAccountResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLedgerAccount extends CreatesGarmentRecord
{
    protected static string $resource = LedgerAccountResource::class;
}
