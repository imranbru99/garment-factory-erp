<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PayrollLine;

class PayrollLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return PayrollLine::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
