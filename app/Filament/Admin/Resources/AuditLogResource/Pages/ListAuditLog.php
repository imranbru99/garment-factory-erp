<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AuditLogResource\Pages;

use App\Filament\Admin\Resources\AuditLogResource;
use App\Filament\Support\ListsGarmentRecords;

class ListAuditLog extends ListsGarmentRecords
{
    protected static string $resource = AuditLogResource::class;
}
