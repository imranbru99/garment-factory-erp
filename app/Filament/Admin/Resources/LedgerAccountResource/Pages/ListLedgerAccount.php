<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LedgerAccountResource\Pages;

use App\Filament\Admin\Resources\LedgerAccountResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLedgerAccount extends ListsGarmentRecords
{
    protected static string $resource = LedgerAccountResource::class;
}
