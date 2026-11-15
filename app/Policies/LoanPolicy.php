<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Loan;

class LoanPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Loan::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
