<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Applicant;

class ApplicantPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Applicant::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
