<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PlaybookStep;

class PlaybookStepPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return PlaybookStep::class;
    }

    protected function module(): string
    {
        return 'issues';
    }
}
