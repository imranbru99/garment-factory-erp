<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ExportBill;

class ExportBillPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ExportBill::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
