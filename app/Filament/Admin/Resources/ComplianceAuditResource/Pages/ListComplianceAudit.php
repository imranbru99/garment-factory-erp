<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ComplianceAuditResource\Pages;

use App\Filament\Admin\Resources\ComplianceAuditResource;
use App\Filament\Support\ListsGarmentRecords;

class ListComplianceAudit extends ListsGarmentRecords
{
    protected static string $resource = ComplianceAuditResource::class;
}
