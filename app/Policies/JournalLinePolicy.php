<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\JournalLine;

class JournalLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return JournalLine::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
