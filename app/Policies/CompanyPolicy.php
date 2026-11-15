<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Company;

class CompanyPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Company::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
