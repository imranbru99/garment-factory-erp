<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CaseStudy;

class CaseStudyPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return CaseStudy::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
