<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ChemicalItem;

class ChemicalItemPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ChemicalItem::class;
    }

    protected function module(): string
    {
        return 'compliance';
    }
}
