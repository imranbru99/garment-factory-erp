<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\UtilizationDeclaration;

class UtilizationDeclarationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return UtilizationDeclaration::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
