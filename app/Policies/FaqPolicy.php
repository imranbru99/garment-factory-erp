<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Faq;

class FaqPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Faq::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
