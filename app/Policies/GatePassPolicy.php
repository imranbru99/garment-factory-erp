<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\GatePass;

class GatePassPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return GatePass::class;
    }

    protected function module(): string
    {
        return 'shipping';
    }
}
