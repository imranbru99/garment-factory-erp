<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\HsCode;

class HsCodePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return HsCode::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
