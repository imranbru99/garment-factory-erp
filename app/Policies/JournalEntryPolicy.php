<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\JournalEntry;

class JournalEntryPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return JournalEntry::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
