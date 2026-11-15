<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Inquiry;

class InquiryPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Inquiry::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
