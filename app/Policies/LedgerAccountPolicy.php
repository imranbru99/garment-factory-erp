<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LedgerAccount;

class LedgerAccountPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LedgerAccount::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
