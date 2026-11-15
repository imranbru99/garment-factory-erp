<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ContactMessage;

class ContactMessagePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ContactMessage::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
