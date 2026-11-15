<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ComplianceAudit;

class ComplianceAuditPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ComplianceAudit::class;
    }

    protected function module(): string
    {
        return 'compliance';
    }
}
