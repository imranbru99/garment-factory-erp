<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AuditFindingResource\Pages;

use App\Filament\Admin\Resources\AuditFindingResource;
use App\Filament\Support\ListsGarmentRecords;

class ListAuditFinding extends ListsGarmentRecords
{
    protected static string $resource = AuditFindingResource::class;
}
