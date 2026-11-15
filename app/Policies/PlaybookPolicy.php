<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Playbook;

class PlaybookPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Playbook::class;
    }

    protected function module(): string
    {
        return 'issues';
    }
}
