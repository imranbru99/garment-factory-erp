<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AuditFinding;

class AuditFindingPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return AuditFinding::class;
    }

    protected function module(): string
    {
        return 'compliance';
    }
}
