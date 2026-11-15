<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ComplianceAuditResource\Pages;

use App\Filament\Admin\Resources\ComplianceAuditResource;
use App\Filament\Support\EditsGarmentRecord;

class EditComplianceAudit extends EditsGarmentRecord
{
    protected static string $resource = ComplianceAuditResource::class;
}
