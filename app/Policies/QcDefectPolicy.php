<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\QcDefect;

class QcDefectPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return QcDefect::class;
    }

    protected function module(): string
    {
        return 'quality';
    }
}
