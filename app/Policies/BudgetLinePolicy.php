<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BudgetLine;

class BudgetLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BudgetLine::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
