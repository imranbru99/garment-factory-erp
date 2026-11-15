<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Bank;

class BankPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Bank::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
