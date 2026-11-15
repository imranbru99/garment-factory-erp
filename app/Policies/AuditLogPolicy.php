<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AuditLog;

class AuditLogPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return AuditLog::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
